/* Optional functions that are a shortcut to call jAlert */
function alert(a, b) { "undefined" == typeof b && (b = a, a = ""), $.jAlert({ title: a, content: b }) }
function confirm(a, b, c) { $.jAlert({ type: "confirm", confirmQuestion: c, onConfirm: a, onDeny: b }) }