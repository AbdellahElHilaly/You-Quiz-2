

<div class="quiz-body" id="quiz-body-id">
    <div id="valiadation-container-id" class="valiadation-container">
        <button id="btn-start-quiz" class="button-start-quize" disabled>Go !</button>
        <input onkeyup="validation(this.value)"  type="text" id="username-input-id" class="inpute-username" placeholder="enter your name" require>
        <p class="message-validation" id="message-validation-id">incorect user name </p>
    </div>
    
    <section id="quiz-page" class="quiz-page">
        <div class="quistion-container">
            <p id="text-question-id">
                no data ! 
            </p>
        </div>
        <?php include_once '../layout/card.php'?>
        <?php include_once '../layout/time-bar.php'?>
    </section>
</div>
<script src="../../js/helper/variable.js"></script>
<script src="../../js/quize/user/user.js"></script>
<script src="../../js/data/questions.js"></script>
<script src="../../js/quize/play/show.js"></script>
<script src="../../js/quize/play/time-bar.js"></script>
<script src="../../js/helper/functions.js"></script>
<script src="../../js/quize/play/play.js"></script>
<script src="../../js/quize/play/animation.js"></script>
<script src="../../js/quize/play/game-over.js"></script>
<script src="../../js/helper/validation/validation.js"></script>


