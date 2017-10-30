<div id="board">
    <div id="todo">
    </div>
    <div id="inprogress"></div>
    <div id="done"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
  function init() {
    var notesCount = 0;
    var areas = $('#todo, #inprogress, #done');

    areas.bind('dragover', function (event) {
      event.preventDefault();
    });
    areas.bind('drop', function (event) {
      var notecard = event.originalEvent.dataTransfer.getData("text/plain");
      event.target.appendChild(document.getElementById(notecard));
      event.preventDefault();
    });

    $('#addNote').submit(function (event) {
      event.preventDefault();
      notesCount++;
      var title = $('#noteTitle').val();
      var text = $('#noteText').val();
      var note = document.createElement('div');
      note.setAttribute('id', 'note' + notesCount);
      note.setAttribute('draggable', 'true');
      var noteTitle = document.createElement('div');
      noteTitle.setAttribute('class', 'cardTitle');
      noteTitle.appendChild(document.createTextNode(title));
      note.appendChild(noteTitle);
      note.appendChild(document.createTextNode(text));
      $(note).bind('dragstart', function (event) {
        event.originalEvent.dataTransfer.setData("text/plain", event.target.getAttribute('id'));
      });
      document.getElementById('todo').appendChild(note);
    })
  }

  $('document').ready(function () {
    init();
  });
</script>
<br>
<br>
<br>
<br>
<br>
<form id="addNote">
    <div class="form-group">
        <input type="text" id="noteTitle" class="form-control" placeholder="Note Title">
        <textarea id="noteText" class="form-control" placeholder="Enter your text here"></textarea>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>