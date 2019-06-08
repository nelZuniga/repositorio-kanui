<link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap-combined.min.css" rel="stylesheet">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.0.3/angular.min.js"></script>
<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js"></script>

<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal">×</button>
  <h3 ng-hide="newUser">Heading</h3>
</div>


<ul class="nav nav-tabs" id="tabContent">
    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
    <li><a href="#access-security" data-toggle="tab">Access / Security</a></li>
    <li><a href="#networking" data-toggle="tab">Networking</a></li>
</ul>

<div class="tab-content">
    <div class="tab-pane active" id="details">

            Details tab
       <div class="control-group">
           <label class="control-label">Instance Name</label>
       </div>
    </div>

    <div class="tab-pane" id="access-security">
        content 0
    </div> 
    <div class="tab-pane" id="networking">
        content 1
    </div> 
</div>