<section>
    <div class="container">
        <h3 class="text-center">$Title</h3>
        <% if not $quiz_completed %>
            <p class="text-center">
                The quiz will start when you click the "Start Quiz" button. It will automatically submit when the timer runs out.
                <strong>Duration: 60 minutes.</strong> Good Luck!
            </p>
        <% end_if %>
        <div class="grid">
            <div class="g-start-1 g-col-12 g-start-lg-2 g-col-lg-10 g-start-xxl-3 g-col-xxl-8">
                <% if $quiz_completed %>
                    <div class="quiz-results">
                        <h2>Quiz Completed!</h2>
                        <p>Your score: <strong>$quiz_score</strong> out of <strong>$quiz_total_questions</strong> Questions</p>
                        <p>Percentage: <strong>$percentage%</strong></p>
                        <p class="grade-label grade-$grade">Grade: <strong>$grade</strong></p>

                        <p>View all completed Quizes <a href="/my-profile">here</a></p>
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
