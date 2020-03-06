let notesCount = 0
const cols = [
  {
    id: 'sdasg4qdsa',
    title: 'Open'
  },
  {
    id: 'asgsfasvbda',
    title: 'In Progress'
  },
  {
    id: 'sgasfsacasc',
    title: 'Done'
  }
]

function createAddNoteForm () {
  const addForm = document.createElement('form')
  const titleLabel = document.createElement('label')
  const titleInput = document.createElement('input')
  const contentLabel = document.createElement('label')
  const contentInput = document.createElement('textarea')
  const submitButton = document.createElement('input')

  titleLabel.textContent = 'Title'
  titleLabel.append(titleInput)
  titleInput.type = 'text'
  contentLabel.textContent = 'Content'
  contentLabel.append(contentInput)
  submitButton.type = 'submit'
  submitButton.value = 'Save'
  addForm.append(titleInput, contentInput, submitButton)
  addForm.addEventListener('submit', event => {
    event.preventDefault()
    notesCount++

    const noteElement = document.createElement('div')
    const noteTitleElement = document.createElement('div')
    const noteBodyElement = document.createElement('div')

    noteElement.setAttribute('id', 'note' + notesCount)
    noteElement.setAttribute('draggable', 'true')
    noteElement.classList.add('note')
    noteBodyElement.classList.add('note-body')
    noteBodyElement.textContent = contentInput.value
    noteTitleElement.classList.add('note-title')
    noteTitleElement.textContent = titleInput.value
    noteElement.append(noteTitleElement)
    noteElement.append(noteBodyElement)
    noteElement.addEventListener('dragstart', e => e.dataTransfer.setData('text/plain', noteElement.id))
    document.getElementById(cols[0].id).append(noteElement)
  })

  return addForm
}

function init () {
  const board = document.createElement('div')

  const columns = cols.map(col => {
    const column = document.createElement('div')

    column.classList.add('note-column')
    column.id = col.id
    return column
  })

  board.classList.add('note-board')
  board.append(...columns)

  columns.forEach(column => {
    column.addEventListener('dragover', e => {
      e.preventDefault()
      e.dataTransfer.dropEffect = 'copyMove'
    })
    column.addEventListener('drop', e => {
      e.preventDefault()
      const noteCardId = e.dataTransfer.getData('text/plain')
      column.append(document.getElementById(noteCardId))
    })
  })
  document.getElementById('app').append(board, createAddNoteForm())
}

document.addEventListener('DOMContentLoaded', () => init())