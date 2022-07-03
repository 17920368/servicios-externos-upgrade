/* -------------------------------------------------------------------------- */
/*                           first letter capitalize                          */
/* -------------------------------------------------------------------------- */
function firstLetterToCapitalize(str) {
    let value = str.value;
    return (str.value = value.charAt(0).toUpperCase() + value.slice(1));
}
