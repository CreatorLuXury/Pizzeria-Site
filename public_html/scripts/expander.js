function expand(index) {
    flag[index] = false;
    document.querySelector('.x' + index).addEventListener('click', () => {
        flag[index] = !flag[index];
        if (flag[index]) {
            document.querySelector('.ext' + index).style.display = 'block';
        } else {
            document.querySelector('.ext' + index).style.display = 'none';
        }
    });
}