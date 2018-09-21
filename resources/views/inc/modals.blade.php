<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="fa fa-close" data-dismiss="modal">&times;</button>                 
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="form">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="course_code">Course ID:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="course_code" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="course_name">Course Name:</label>
                        <div class="col-sm-10">
                            <input class="form-control" id="course_name" type="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="course_type">Course Type:</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="course_type" id="course_type">
                                <option value="f">Free Course</option>
                                <option value="c">University course</option>
                            </select>
                            <!-- <input class="form-control" id="course_type" type="name"> -->
                        </div>
                    </div>
                    <input type="hidden" id="course_id">
                    <input type="hidden" id="course_publish">
                </form>
                <div class="deleteContent">
                    Are you sure you want to disable <strong><span class="name"></span></strong> ?  
                    <input class="form-control" id="course_id" type="hidden">
                </div>

                <div class="publishContent">
                    Are you sure you want to publish <strong><span class="name"></span></strong> ?  
                    <input class="form-control" id="course_id_publish" type="hidden">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn actionBtn" data-dismiss="modal">
                        <span id="footer_action_button" class="glyphicon"> </span>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal">
                        <span class="glyphicon glyphicon-remove"></span> Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>