<x-layout.head>
    @vite(['resources/lib/alpine.js'])
    <div class="type {{$typeCamps['background']}}">
        <div x-data="{ step: 1 }">
            <div x-show="step === 1">
                <div class="svg-type">
                    @if ($typeCamps["id"] == 1)
                    <svg xmlns="http://www.w3.org/2000/svg" width="268" height="352" viewBox="0 0 268 352" fill="none">
                        <path d="M243.384 80.9822L250.144 53.9625L242.582 46.3191L242.448 35.6974L236.64 31.9285L227.853 29.9737L222.923 42.6383L220.559 43.0622L215.451 34.8818L201.938 62.6907L199.865 77.756L206.458 92.5197L212.125 83.4933L218.022 84.3041L223.105 83.4871L228.789 82.7757L241.913 97.1563L232.555 117.159L221.548 120.312V135.405L232.702 131.156L235.513 165.95L262.121 93.1958L260.237 77.0916L257.525 57.068L258.444 9.54912L244.068 2.83051L203.704 27.0646L218.224 18.3471L219.659 9.92603L197.265 12.9084L184.895 19.2911L148.121 31.7205L136.755 22.6504L126.391 27.3534L124.719 52.8841L85.6051 100.586L83.0142 121.053L95.3018 104.685L209.634 256.794L77.6804 195.048L96.5956 120.574L55.1828 173.483L55.5073 219.694L114.022 272.583L42 227.452L44.1467 178.341L2.5127 243.848L5.37048 348.167L110.981 300.221L207.207 274.237L265.229 267.091L258.109 207.412L246.074 176.842L233.326 179.46L219.184 209.341L223.033 153.332L193.253 156.351L207.319 139.169" stroke="#7DC1FF" stroke-width="4" stroke-linecap="round" />
                    </svg>
                    @elseif ($typeCamps["id"] == 2)
                    <svg xmlns="http://www.w3.org/2000/svg" width="516" height="359" viewBox="0 0 516 359" fill="none">
                        <path d="M290.598 24.6638L265.302 74.6307L276.503 93.4786L264.319 109.364L270.96 111.472L272.298 129.875L273.461 145.891L273.939 152.467L274.561 161.038L276.825 192.2L266.832 194.551L289.17 293.309L278.046 327.488L268.571 355L308.494 335.268L356.434 242.905L409.322 206.539L399.395 171.392L297.715 154.098L407.423 159.379L417.379 191.369L482.421 171.808L513.727 104.023L476.909 27.9017L452.287 19.0258L392.591 121.099L429.704 10.8851L407.831 3L342.571 28.2391L305.671 71.2027L258 152.042L210.329 71.2027L173.43 28.2391L108.169 3L39.0919 27.9017L2.27344 104.023L20.7529 144.035L108.717 46.8668L33.5798 171.808L98.6211 191.369L108.578 159.379L218.286 154.098L116.606 171.392L106.679 206.539L159.567 242.905L207.507 335.268L247.43 355L237.955 327.488L226.831 293.309L249.169 194.551L239.175 192.2L241.439 161.038L242.062 152.467L242.54 145.891L243.703 129.875L245.04 111.472L251.681 109.364L239.498 93.4786L250.698 74.6307L225.402 24.6638" stroke="#9E63FF" stroke-width="3.99999" />
                    </svg>
                    @elseif ($typeCamps["id"] == 3)
                    <svg xmlns="http://www.w3.org/2000/svg" width="421" height="358" viewBox="0 0 421 358" fill="none">
                        <path d="M316.396 141.904L333.558 140.095L348.703 141.761L361.063 171.277L388.641 187.617L368 155.51L386.347 112.318L389.405 139.074L418.455 174.239L416.926 200.995L383.29 209.404L351.947 200.231L348.889 213.226L330.542 223.164L312.195 252.214L302.257 275.912L272.443 289.672L251.038 274.383L241.865 230.809L225.811 207.111L244.922 170.417L203.642 219.342L223.54 237.812L229.633 257.565L222.782 284.212L213.774 320.67L149.829 338.946L139.264 349.101L119.25 355L116.957 344.298L110.077 347.355L113.135 316.013L139.891 305.31L148.601 278.206L153.952 262.916L111.906 275.912L95.0884 233.102L82.8524 198.207L226.323 153.877L122.151 173.12L74.448 174.239L197.395 105.238L114.8 67.2918L92.7949 133.723L60.995 109.484L5.54492 112.209L114.512 13.3168L205.935 3L324.804 89.9198L273.619 88.6805L337.58 102.063L378.768 27.8993L356.534 129.9L334.459 127.712L287.639 137.779L300.508 153.709" stroke="#F62E2E" stroke-width="3.99999" />
                    </svg>
                    @endif
                </div>
                <div class="text">
                    <h1>seu perfil é <span class="{{$typeCamps['type']}}">{{$typeCamps["type"]}}</span></h1>
                    <h2>O quê isso significa?</h2>
                    <div class="description">
                        <p>{{$typeCamps["description"]}}</p>
                    </div>
                    <button class="step-button" @click.prevent="step = 2">
                        <i class="bi bi-arrow-down"></i>
                    </button>
                </div>
            </div>

            <div x-show="step === 2">
                <div class="text">
                    <button class="step-button" @click.prevent="step = 1">
                        <i class="bi bi-arrow-up"></i>
                    </button>
                    <div class="paragraph {{$typeCamps['paragraph']}}">
                        <p>{{$typeCamps["info-paragraph-1"]}}</p>
                        <p>{{$typeCamps["info-paragraph-2"]}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.head>