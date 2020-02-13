<!-- START COMPOSE EMAIL -->
<div class="email-composer container-fluid">
  <div class="row">
    <div class="col-md-12 no-padding">
      <div class="wysiwyg5-wrapper email-toolbar-wrapper">
      </div>
      <form id="form-project" role="form" autocomplete="off">
        <div class="form-group-attached">
          <div class="row clearfix">
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>TO:</label>
                <input name="to" data-role="tagsinput" class="form-control tagsinput" type="text" value="John Smith" />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>CC:</label>
                <input type="text" class="form-control" name="cc" placeholder="Add Carbon Copy">
              </div>
            </div>
          </div>
          <div class="form-group form-group-default">
            <label>Subject</label>
            <input type="text" class="form-control" name="subject">
          </div>
        </div>
      </form>
      <div class="wysiwyg5-wrapper email-body-wrapper">
        <textarea class="wysiwyg email-body" style="height:350px"></textarea>
      </div>
    </div>
  </div>
  <div class="row p-b-20">
    <div class="col-md-11 d-md-flex d-lg-flex d-xl-flex d-block">
      <button class="btn btn-white btn-cons">Cancel</button> <button class="btn btn-complete btn-cons m-l-10">Send</button>
      <div class="checkbox d-inline-flex m-l-20">
        <input id="sendCC" type="checkbox" value="1"> 
        <label class="hint-text d-none d-lg-block" for="sendCC">Send a <span class="text-complete">Carbon Copy</span> CC to my Primary email address.</label> 
        <label class="hhint-text d-md-none" for="sendCC">Send me a CC</label>
      </div>
    </div>
    <div class="col-md-1">
      <button class="btn btn-complete pull-right"><i class="pg-save"></i></button>
    </div>
  </div>
</div>
<!-- END COMPOSE EMAIL -->
