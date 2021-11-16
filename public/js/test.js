const stick = document.querySelector('.stick');
const splitStick = stick.innerHTML.split('');

const spanStick = splitStick.map(function (value) {
    return `<div>${value}</div>`;
});

stick.innerHTML = spanStick.join('');

const span = document.querySelectorAll('.stick div');

span.forEach(function (value, index) {

    let i = index;
    value.classList.add('ls');
    setTimeout(function () {
        setInterval(function () {
            i++;
            value.style.transform = `rotate3d(${i},${i},${i},${i}deg)`;

        }, 10)
    }, i * 800)

})
