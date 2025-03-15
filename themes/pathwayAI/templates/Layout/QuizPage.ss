<section>
    <div class="container">
        <h3 class="text-center">$Title</h3>
		<p class="text-center">
            The quiz will start when you click the "Start Quiz" button. It will automatically submit when the timer runs out.
            <strong>Duration: $Quiz.Duration minutes.</strong> Good Luck!
        </p>
        <div class="grid">
            <div class="g-start-1 g-col-12 g-start-lg-2 g-col-lg-10 g-start-xxl-3 g-col-xxl-8">
                <% if $quiz_completed %>
                    <div class="quiz-results">
                        <h2>Quiz Completed!</h2>
                        <p>Your score: $quiz_score / $quiz_total_questions</p>
                    </div>
                <% else %>
                    <div id="quiz-intro">
                        <button id="start-quiz" class="btn btn-green rounded-pill">Start Quiz</button>
                    </div>

                    <div id="quiz-timer" class="d-none">
                        <strong>Time Left: <span id="timer-display"></span></strong>
                    </div>

                    <form $QuizForm.AttributesHTML id="Form_QuizForm">
                        <ul class="accordion" data-function="accordion">
                            <% loop QuizForm.Fields %>
                                <% if $Name == 'SecurityID' %>
                                    <li class="d-none">
                                        $Field
                                    </li>
                                <% else %>
                                    <li>
                                        <a href="#" class="d-block lh-sm fs-5 fw-medium"><span class="d-block">$Title</span></a>
                                        <div class="accordion-item pb-1">
                                            <div class="content-section">
                                                $Field
                                            </div>
                                        </div>
                                    </li>
                                <% end_if %>
                            <% end_loop %>
                        </ul>
                        <div class="form-actions mb-2">
                            $QuizForm.Actions
                        </div>
                    </form>
                <% end_if %>
            </div>
        </div>
    </div>
</section>

<script type="application/javascript">
document.addEventListener("DOMContentLoaded", function() {
    const startButton = document.getElementById("start-quiz");
    const quizForm = document.getElementById("Form_QuizForm");
    const quizTimer = document.getElementById("quiz-timer");
    const timerDisplay = document.getElementById("timer-display");

	quizForm.style.display = "none";

    const quizDuration = parseInt("{$Quiz.Duration}", 10) * 60; 
    let timeLeft = quizDuration;
    let timerInterval;

    function updateTimer() {
        const minutes = Math.floor(timeLeft / 60);
        const seconds = timeLeft % 60;
        timerDisplay.textContent = `${minutes}:${seconds < 10 ? "0" : ""}${seconds}`;
        
        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            document.getElementById("Form_QuizForm_action_submitQuiz").click();
        }
        
        timeLeft--;
    }

    startButton.addEventListener("click", function() {
        startButton.style.display = "none";
        quizForm.style.display = "block";
        quizTimer.classList.remove("d-none");

        updateTimer();
        timerInterval = setInterval(updateTimer, 1000);
    });
});
</script>
