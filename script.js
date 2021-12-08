var xvalue = ""

function cbChange(obj) {
    var cbs = document.getElementsByClassName("cb");
    obj.disabled = false
    for (var i = 0; i < cbs.length; i++) {
        if (obj !=  cbs[i])
            cbs[i].disabled = obj.checked;  
    }
    if (obj.checked == true)
        xvalue = obj.value
    else
        xvalue = ""
}

function validateX(x) {
    // (!!) - синтаксис приведения к булеву значению
    if (!x.trim())
        return [false, "X is required"]
    const xValues = [-5, -4, -3, -2, -1, 0, 1, 2, 3]
    // (+x) - синтаксис приведения строки к числу
    if (!xValues.includes(+x))
        return [false, "X must be one of the following: -5, -4, -3, -2, -1, 0, 1, 2, 3"]
    return [true]
}

function validateY(y) {
    if (!y.trim())
        return [false, "Y is required"]
    if (+y != y)
        return [false, "Y must be a number"]
    if (+y <= -3 || +y >= 3)
        return [false, "Y must be in range (-3; 3)"]
    return [true]
}

function validateR(r) {
    if (!r.trim())
        return [false, "R is required"]
    if (+r != r)
        return [false, "R must be a number"]
    if (+r <= 1 || +r >= 4)
        return [false, "R must be in range (1; 4)"]
    return [true]
}

const formElement = document.querySelector("#form");
formElement.addEventListener("submit", function (event) {
    const [resX, messageX] = validateX(xvalue)
    const [resY, messageY] = validateY(event.target.y.value)
    const [resR, messageR] = validateR(event.target.r.value)
    if (!resY || !resX || !resR) {
        event.preventDefault()
        messageX && alert(messageX)
        messageY && alert(messageY)
        messageR && alert(messageR)
    }
    else 
        xvalue = ""
})