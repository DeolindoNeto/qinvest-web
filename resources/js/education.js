document.addEventListener("DOMContentLoaded", function () {
    const topics = document.querySelectorAll(".topic");
    const indexLinks = document.querySelectorAll(".index a");
    let currentTopicIndex = 0;
    const prevButton = document.getElementById("prevButton");
    const nextButton = document.getElementById("nextButton");
    const buttonContainer = document.querySelector(".button-container"); // Atualizado: Seleciona o contêiner das setas
    const buttonBars = document.querySelector(".button-bars");
    const index = document.querySelector(".index");
    const content = document.querySelector(".content");  
    // Function to update the content based on the selected topic index
    function updateContent(index) {
      topics.forEach((topic, i) => {
        if (i === index) {
          topic.style.display = "block";
        } else {
          topic.style.display = "none";
        }
      });
      currentTopicIndex = index;
      updateButtonVisibility();
    }
  
    // Function to handle index link clicks
    function handleIndexLinkClick(event) {
      event.preventDefault();
      const targetId = event.target.getAttribute("href").substring(1); // Remove the "#" from href
      const targetIndex = Array.from(topics).findIndex((topic) => topic.id === targetId);
      if (targetIndex !== -1) {
        updateContent(targetIndex);
      }
    }
  
    function scrollToTop() {
      // Função para rolar a página para o topo
      window.scrollTo({
          top: 0,
          behavior: "smooth" // Adiciona um efeito de rolagem suave
      });
  }
    // Add click event listeners to index links
    indexLinks.forEach((link) => {
      link.addEventListener("click", handleIndexLinkClick);
    });
  
    // Hide all topics initially
    topics.forEach((topic, index) => {
      topic.style.display = "none";
    });
  
    // Show the first topic
    topics[currentTopicIndex].style.display = "block";
  
    function updateButtonVisibility() {
      prevButton.disabled = currentTopicIndex === 0; // Disable "Previous" on first topic
      nextButton.disabled = currentTopicIndex === topics.length - 1; // Disable "Next" on last topic

      const contentHeight = content.clientHeight;
      console.log(contentHeight);
      const windowHeight = window.innerHeight;
      console.log(windowHeight);

      // Define o posicionamento vertical das setas
      if (index.style.display === "none") {
          if (contentHeight + 288 > windowHeight) {
            buttonContainer.style.position = "relative";
        } else {
            buttonContainer.style.position = "absolute"; 
      } 
    }
      else{
        if (contentHeight + 288 > windowHeight) {
            buttonContainer.style.position = "relative";
  
        } else {
            buttonContainer.style.position = "absolute"; 
        }
    }
      if (currentTopicIndex === 0) {
        prevButton.style.display = "none";
      } else {
        prevButton.style.display = "block";
      }
      if (currentTopicIndex === topics.length - 1) {
        nextButton.style.display = "none";
      } else {
        nextButton.style.display = "block";
      }
    }
    
  
    function changeTopic(offset) {
      const newTopicIndex = currentTopicIndex + offset;
  
      if (newTopicIndex >= 0 && newTopicIndex < topics.length) {
        topics[currentTopicIndex].style.display = "none"; // Hide the current topic
        currentTopicIndex = newTopicIndex; // Update the current topic index
        topics[currentTopicIndex].style.display = "block"; // Show the new current topic
        updateButtonVisibility(); // Update button visibility
      }
    }
    

    // Function to handle the "bars" button click
    function handleBarsButtonClick() {
      if (index.style.display === "none") {
        index.style.display = "block";
        content.style.width = "70%"; // Aumenta a largura do conteúdo para 70%
      } else {
        index.style.display = "none";
        content.style.width = "100%"; // Restaura a largura do conteúdo para 100%
      }
            updateButtonVisibility();
    }
  // Add click event listener to the "bars" button
  buttonBars.addEventListener("click", handleBarsButtonClick);

  
    // Initialize button visibility
    updateButtonVisibility();
  
    // Add event listeners to buttons
    prevButton.addEventListener("click", () => {
      changeTopic(-1);
      scrollToTop();
    });
  
    nextButton.addEventListener("click", () => {
      changeTopic(1);
      scrollToTop();
    });
  });
  