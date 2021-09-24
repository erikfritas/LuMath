const location_ = this.location.href

function addInput() {
    let newLocation, nums

    const params = new URLSearchParams(window.location.search)

    for (const param of params) {
        if (param[0] == "nums")
            nums = parseInt(param[1])
    }

    if (nums > 25)
        alert("Limite de inputs atingido!")
    else{
        newLocation = location_.replace(`nums=${nums}`, `nums=${nums+1}`)
        this.location.href = newLocation
    }
}
