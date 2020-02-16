const button[]
const button = document.querySelector('.x'+string);
const ext = document.querySelector('.ext'+string);
let flag = false;
button[1].addEventListener('click', () => {
    flag[string] = !flag;
    if (flag[string]) {
        ext[string].style.display = 'block';
    } else {
        ext[string].style.display = 'none';
    }
});