    @vite(['resources/lib/alpine.js'])
    <div class="formulary-page">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <script>
        toastr.options = {
            closeButton: true, // Mostrar botão de fechar
            progressBar: true, // Mostrar barra de progresso
            timeOut: 5000, // Tempo em milissegundos que a notificação ficará visível (5 segundos neste caso)
            extendedTimeOut: 2000, // Tempo adicional para a notificação ficar visível quando o mouse estiver sobre ela (2 segundos neste caso)
        };

        function validarFormulario() {
            console.log("Validando formulário...");
            for (let i = 1; i <= 6; i++) {
                if (!document.querySelector(`input[name="selected_answer${i}"]:checked`)) {
                    toastr.error(`Por favor, responda à pergunta ${i}.`, 'Erro'); // Exibe o Toastr de erro
                    return false; // Cancela o envio do formulário
                }
            }
            return true; // Permite o envio do formulário se todas as perguntas forem respondidas
        }
        </script>
        @if (session('success'))
        <div class="option" class="alert alert-success">
            {{ session('success') }}
        </div class="option">
        @endif
        @if (session('error'))
        <div class="option" class="alert alert-danger">
            {{ session('error') }}
        </div class="option">
        @endif
        <form action="{{ route('formulary') }}" method="POST">
            @csrf
            <div x-data="{ question: 1 }">
                <div x-show=" question === 1" x-transition:enter.opacity.duration.600ms>
                    <div class="formulary-card">
                        <div class="label-question">
                            <label>{{ $question1->text_question }} </label>
                        </div>
                        <div class="question-answers">
                            @foreach($answers->where('question_id', 1) as $answer)
                            <label class="label-option">
                                <input type="radio" class="checkmark" name="selected_answer1" value="{{ $answer->id }}">
                                {{ $answer->text_answer }}
                            </label>
                            @endforeach
                        </div>
                        <button class="step-button" @click.prevent="question = 2 "><i
                                class="bi bi-arrow-right"></i></button>
                    </div>
                </div>
                <div x-show=" question === 2" x-transition:enter.opacity.duration.600ms>
                    <div class="formulary-card">
                        <label class="label-question">{{ $question2->text_question }} </label>
                        <div class="question-answers">
                            @foreach($answers->where('question_id', 2) as $answer)
                            <label class="label-option">
                                <input type="radio" class="checkmark" name="selected_answer2" value="{{ $answer->id }}">
                                {{ $answer->text_answer }}
                            </label>
                            @endforeach
                        </div>
                        <div class="question-controller">
                            <button class="step-button" @click.prevent="question = 1"><i class="bi bi-arrow-left"></i>
                                <button class="step-button" @click.prevent="question = 3 "><i
                                        class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div x-show=" question === 3" x-transition:enter.opacity.duration.600ms>
                    <div class="formulary-card">
                        <label class="label-question">{{ $question3->text_question }} </label>
                        <div class="question-answers">
                            @foreach($answers->where('question_id', 3) as $answer)
                            <label class="label-option">
                                <input type="radio" class="checkmark" name="selected_answer3" value="{{ $answer->id }}">
                                {{ $answer->text_answer }}
                            </label>
                            @endforeach
                        </div>
                        <div class="question-controller">
                            <button class="step-button" @click.prevent="question = 2"><i class="bi bi-arrow-left"></i>
                                <button class="step-button" @click.prevent="question = 4 "><i
                                        class="bi bi-arrow-right"></i></button>
                        </div>
                        <!-- <button type="submit">Enviar</button> -->
                    </div>
                </div>
                <div x-show=" question === 4" x-transition:enter.opacity.duration.600ms>
                    <div class="formulary-card">
                        <label class="label-question">{{ $question4->text_question }} </label>
                        <div class="question-answers">
                            @foreach($answers->where('question_id', 4) as $answer)
                            <label class="label-option">
                                <input type="radio" class="checkmark" name="selected_answer4" value="{{ $answer->id }}">
                                {{ $answer->text_answer }}
                            </label>
                            @endforeach
                        </div>
                        <div class="question-controller">
                            <button class="step-button" @click.prevent="question = 3"><i class="bi bi-arrow-left"></i>
                                <button class="step-button" @click.prevent="question = 5 "><i
                                        class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                </div>
                <div x-show=" question === 5" x-transition:enter.opacity.duration.600ms>
                    <div class="formulary-card">
                        <label class="label-question">{{ $question5->text_question }} </label>
                        <div class="question-answers">
                            @foreach($answers->where('question_id', 5) as $answer)
                            <label class="label-option">
                                <input type="radio" class="checkmark" name="selected_answer5" value="{{ $answer->id }}">
                                {{ $answer->text_answer }}
                            </label>
                            @endforeach
                        </div>
                        <div class="question-controller">
                            <button class="step-button" @click.prevent="question = 4"><i class="bi bi-arrow-left"></i>
                                <button class="step-button" @click.prevent="question = 6"><i
                                        class="bi bi-arrow-right"></i></button>
                        </div>
                        <!-- <button type="submit">Enviar</button> -->
                    </div>
                </div>
                <div x-show=" question === 6" x-transition:enter.opacity.duration.600ms>
                    <div class="formulary-card">
                        <label class="label-question">{{ $question6->text_question }} </label>
                        <div class="question-answers">
                            @foreach($answers->where('question_id', 6) as $answer)
                            <label class="label-option">
                                <input type="radio" class="checkmark" name="selected_answer6" value="{{ $answer->id }}">
                                {{ $answer->text_answer }}
                            </label>
                            @endforeach
                        </div>
                        <div class="question-controller">
                            <button class="step-button" @click.prevent="question = 5"><i
                                    class="bi bi-arrow-left"></i></button>
                            <button class="step-button" @click.prevent="question = 7"><i
                                    class="bi bi-arrow-right"></i></button>
                        </div>
                        <!-- <button type="submit">Enviar</button> -->
                    </div>
                </div>
                <div x-show=" question === 7" x-transition:enter.opacity.duration.600ms>
                    <div class="formulary-card">
                        <div class="label-question">Ok, chegamos a um resultado.</div>
                        <p>Visualizar resultado!</p>
                        <div class="question-controller">
                            <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                            <button class="step-button" type="submit" onclick="enviarFormulario();">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script>
function enviarFormulario() {
    if (validarFormulario()) {
        toastr.success('Formulário enviado com sucesso!', 'Sucesso');
    }
}
    </script>