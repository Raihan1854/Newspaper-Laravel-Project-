<style>

@import url(//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css);

.detailBox {

  border:1px solid #bbb;

}
.titleBox {
  background-color:#fdfdfd;
  padding:10px;
}
.titleBox label{
color:#444;
margin:0;
display:inline-block;
}

.commentBox {
  padding:10px;
  border-top:1px dotted #bbb;
}
.commentBox .form-group:first-child, .actionBox .form-group:first-child {
  width:80%;
}
.commentBox .form-group:nth-child(2), .actionBox .form-group:nth-child(2) {
  width:18%;
}
.actionBox .form-group * {
  width:100%;
}
.taskDescription {
  margin-top:10px 0;
}
.commentList {
  padding:0;
  list-style:none;
  max-height:200px;
  overflow:auto;
}
.commentList li {
  margin:0;
  margin-top:10px;
}
.commentList li > div {
  display:table-cell;
}
.commenterImage {
  width:30px;
  margin-right:5px;
  height:100%;
  float:left;
}
.commenterImage img {
  width:100%;
  border-radius:50%;
}
.commentText p {
  margin:0;
}
.sub-text {
  color:#aaa;
  font-family:verdana;
  font-size:11px;
}
.actionBox {
  border-top:1px dotted #bbb;
  padding:10px;
}

</style>

<div class="detailBox">
    <div class="titleBox">
      <label>Comment Box</label>
        <button type="button" class="close" aria-hidden="true">&times;</button>
    </div>
    <div class="commentBox">

        <p class="taskDescription">All In All Thanks For Comment</p>
    </div>
    <div class="actionBox">
        <ul class="commentList">
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/50/50" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/45/45" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment and this comment is particularly very long and it goes on and on and on.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
            <li>
                <div class="commenterImage">
                  <img src="http://placekitten.com/40/40" />
                </div>
                <div class="commentText">
                    <p class="">Hello this is a test comment.</p> <span class="date sub-text">on March 5th, 2014</span>

                </div>
            </li>
        </ul>

    </div>
</div>
