import "chartjs-adapter-moment";
import { Chart, registerables } from "chart.js";
Chart.register(...registerables);

document.addEventListener("DOMContentLoaded", () => {
    const stockForm = document.getElementById("stockForm");

    stockForm.addEventListener("submit", handleFormSubmit);

    async function handleFormSubmit(event) {
        event.preventDefault();

        const tickers = document.getElementById("tickers").value;
        const data = await fetchStockData(tickers);

        displayStockData(data);
    }

    async function fetchStockData(tickers) {
        const response = await fetch(`/api/stock/${tickers}`);
        return await response.json();
    }

    function displayStockData(data) {
        createCharts(data);
    }
});

function createCharts(data) {
    const historicalData = data.results[0].historicalDataPrice;
    const dates = historicalData.map((stock) => stock.date * 1000);
    const closePrices = historicalData.map((stock) => stock.close);
    const profitPercentages = calculateProfitPercentages(closePrices);

    const ctxStock = document.getElementById("stockChart").getContext("2d");
    const ctxProfit = document.getElementById("profitChart").getContext("2d");

    const existingChartStock = Chart.getChart(ctxStock);
    if (existingChartStock) {
        existingChartStock.destroy();
    }

    const existingChartProfit = Chart.getChart(ctxProfit);
    if (existingChartProfit) {
        existingChartProfit.destroy();
    }

    new Chart(ctxStock, {
        type: "line",
        data: {
            labels: dates,
            datasets: [
                {
                    label: "Price",
                    data: closePrices,
                    backgroundColor: "rgba(144,0,255, 0.2)",
                    borderColor: "rgba(188, 102, 255, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            animation: {
                duration: 1500,
                easing: "linear",
            },
            scales: {
                x: {
                    type: "time",
                    time: {
                        tooltipFormat: "DD/MM/YYYY",
                        displayFormats: {
                            day: "DD/MM/YYYY",
                        },
                        unit: "day",
                        stepSize: 1,
                    },
                    title: {
                        display: true,
                        text: "Date",
                        color: "#ffffff", // Cor do título do eixo x
                    },
                    ticks: {
                        color: "#ffffff", // Cor dos rótulos do eixo x
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: "Price",
                        color: "#ffffff", // Cor do título do eixo y
                    },
                    ticks: {
                        color: "#ffffff", // Cor dos rótulos do eixo y
                    },
                },
            },
        },
    });

    new Chart(ctxProfit, {
        type: "line",
        data: {
            labels: dates,
            datasets: [
                {
                    label: "Profit Percentage",
                    data: profitPercentages,
                    backgroundColor: "rgba(255,99,132, 0.2)",
                    borderColor: "rgba(255, 0, 0, 1)",
                    borderWidth: 1,
                    fill: false,
                },
            ],
        },
        options: {
            animation: {
                duration: 1500,
                easing: "linear",
            },
            scales: {
                x: {
                    type: "time",
                    time: {
                        tooltipFormat: "DD/MM/YYYY",
                        displayFormats: {
                            day: "DD/MM/YYYY",
                        },
                    },
                    title: {
                        display: true,
                        text: "Date",
                        color: "#ffffff"
                    },
                    ticks:{
                        color: "#ffffff",
                    },
                },
                y: {
                    title: {
                        display: true,
                        text: "Profit Percentage (%)",
                        color: "#ffffff",
                    },
                    ticks:{
                        color: "#ffffff",
                    },
                },
            },
        },
    });
}

function calculateProfitPercentage(previousClose, currentClose) {
    return ((currentClose - previousClose) / previousClose) * 100;
}

function calculateProfitPercentages(closePrices) {
    const profitPercentages = [];

    for (let i = 0; i < closePrices.length; i++) {
        if (i === 0) {
            profitPercentages.push(null);
        } else {
            const profitPercentage = calculateProfitPercentage(
                closePrices[i - 1],
                closePrices[i]
            );
            profitPercentages.push(profitPercentage);
        }
    }
    return profitPercentages;
}