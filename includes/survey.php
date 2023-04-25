<!-- Modal -->
<div class="no-print modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg mx-0 mx-sm-auto">
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <h5 class="modal-title text-white" id="exampleModalLabel">Feedback request</h5>
        <button type="button" class="btn-close text-white" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="text-center">
          <i class="far fa-file-alt fa-4x mb-3 text-primary"></i>
          <p>
            <strong>Your opinion matters</strong>
          </p>
          <p>
            Have some ideas how to improve our product?
            <strong>Give us your feedback.</strong>
          </p>
        </div>

        <hr />

        <form class="px-4" id="survey_form" action="survey_save.php?event_id=<?php echo $event_row['event_id']; ?>" method="POST">
            <hr class="hr hr-blurry" />
            <!-- 1 -->
            <div class="mx-0 mx-sm-auto">
                <div class="text-center"><p><strong>1. What is your level of satisfaction with this event?</strong></p></div>
                <div class="text-center mb-3">
                    <div class="d-inline mx-3">Bad</div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question1" id="inlineRadio1" value="option1" required/>
                    <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question1" id="inlineRadio2" value="option2" required/>
                    <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question1" id="inlineRadio3" value="option3" required/>
                    <label class="form-check-label" for="inlineRadio3">3</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question1" id="inlineRadio4" value="option4" required/>
                    <label class="form-check-label" for="inlineRadio4">4</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question1" id="inlineRadio5" value="option5" required/>
                    <label class="form-check-label" for="inlineRadio5">5</label>
                    </div>

                    <div class="d-inline me-4">Excellent</div>
                </div>
            </div>
            <hr class="hr hr-blurry" />
            <hr class="hr hr-blurry" />


            <!-- 2 -->
            <p class="text-center"><strong>2. Which elements of the event did you like the most?</strong></p>
            <!-- Message input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" name="question2" id="form4Example4" rows="4" required></textarea>
                <label class="form-label" for="form4Example4">Your feedback</label>
            </div>
            <hr class="hr hr-blurry" />
            <hr class="hr hr-blurry" />

            <!-- 3 -->
            <p class="text-center"><strong>3. What, if anything, did you dislike about this event?</strong></p>
            <!-- Message input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" name="question3" id="form4Example4" rows="4" required></textarea>
                <label class="form-label" for="form4Example4">Your feedback</label>
            </div>
            <hr class="hr hr-blurry" />
            <hr class="hr hr-blurry" />

            <!-- 4 -->
            <div class="mx-0 mx-sm-auto">
                <div class="text-center"><p><strong>4. Are you likely to participate in one of our events in the future?</strong></p></div>
                <div class="text-center mb-3">
                    <div class="d-inline mx-3">Bad</div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question4" id="inlineRadio1" value="option1" required/>
                    <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question4" id="inlineRadio2" value="option2" required/>
                    <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question4" id="inlineRadio3" value="option3" required/>
                    <label class="form-check-label" for="inlineRadio3">3</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question4" id="inlineRadio4" value="option4" required/>
                    <label class="form-check-label" for="inlineRadio4">4</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question4" id="inlineRadio5" value="option5" required/>
                    <label class="form-check-label" for="inlineRadio5">5</label>
                    </div>

                    <div class="d-inline me-4">Excellent</div>
                </div>
            </div>
            <hr class="hr hr-blurry" />
            <hr class="hr hr-blurry" />

            <!-- 5 -->
            <div class="mx-0 mx-sm-auto">
                <div class="text-center"><p><strong>5. How likely are you to tell a friend about this event?</strong></p></div>
                <div class="text-center mb-3">
                    <div class="d-inline mx-3">Bad</div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question5" id="inlineRadio1" value="option1" required/>
                    <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question5" id="inlineRadio2" value="option2" required/>
                    <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question5" id="inlineRadio3" value="option3" required/>
                    <label class="form-check-label" for="inlineRadio3">3</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question5" id="inlineRadio4" value="option4" required/>
                    <label class="form-check-label" for="inlineRadio4">4</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question5" id="inlineRadio5" value="option5" required/>
                    <label class="form-check-label" for="inlineRadio5">5</label>
                    </div>

                    <div class="d-inline me-4">Excellent</div>
                </div>
            </div>
            <hr class="hr hr-blurry" />
            <hr class="hr hr-blurry" />

            <!-- 6 -->
            <div class="mx-0 mx-sm-auto">
                <div class="text-center"><p><strong>6. Is there anything else you would like us to know?</strong></p></div>
                <div class="text-center mb-3">
                    <div class="d-inline mx-3">Bad</div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question6" id="inlineRadio1" value="option1" required/>
                    <label class="form-check-label" for="inlineRadio1">1</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question6" id="inlineRadio2" value="option2" required/>
                    <label class="form-check-label" for="inlineRadio2">2</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question6" id="inlineRadio3" value="option3" required/>
                    <label class="form-check-label" for="inlineRadio3">3</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question6" id="inlineRadio4" value="option4" required/>
                    <label class="form-check-label" for="inlineRadio4">4</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question6" id="inlineRadio5" value="option5" required/>
                    <label class="form-check-label" for="inlineRadio5">5</label>
                    </div>

                    <div class="d-inline me-4">Excellent</div>
                </div>
            </div>
            <hr class="hr hr-blurry" />
            <hr class="hr hr-blurry" />

            <!-- 7 -->
            <div class="mx-0 mx-sm-auto">
                <div class="text-center"><p><strong>7. Did you have any issues registering for or attending this event?</strong></p></div>
                <div class="text-center mb-3">

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question7" id="inlineRadio1" value="yes" required/>
                    <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>

                    <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="question7" id="inlineRadio2" value="no" required/>
                    <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>

                </div>
            </div>
            <hr class="hr hr-blurry" required/>

            </form>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-dark" data-mdb-dismiss="modal">
            Close
            </button>
            <button type="submit" name="survey_submit" form="survey_form" class="btn btn-dark">Submit</button>
        </div>
        </div>
    </div>
</div>
             