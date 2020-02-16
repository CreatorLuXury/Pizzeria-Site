const doneTanks = [];
let file = '';
let getXMLFile = function(path, callback) {
  let request = new XMLHttpRequest();
  request.open('GET', path);
  request.setRequestHeader('Content-Type', 'text/xml');
  request.onreadystatechange = function() {
    if (request.readyState === 4 && request.status === 200) {
      callback(request.responseXML);
    }
  };
  request.send();
};
getXMLFile('tanks.xml', function(xml) {
  file = xml.lastChild;
  const readyTanks = [...xml.lastChild.childNodes].filter(
    (element, index) => index % 2 !== 0,
  );

  readyTanks.forEach((tank) => {
    typeTank = [...tank.childNodes].filter((element, index) => index % 2 !== 0);
    typeTank.forEach((tank) => {
      const tankObject = {};
      const attributes = [...tank.attributes];
      attributes.forEach((attribute) => {
        tankObject[attribute.name] = attribute.value;
      });
      const particularyTank = [...tank.childNodes].filter(
        (tank, index) => index % 2 !== 0,
      );
      particularyTank.forEach((tank) => {
        tankObject[tank.tagName] = tank.innerHTML;
      });
      doneTanks.push(tankObject);
    });
  });
});

const xmlButton = document.querySelector('.xml');
const typeButtons = document.querySelectorAll('.tank');
const container = document.querySelector('.container');
const form = document.querySelector('form');
const formInput = document.querySelector('input');
const showTank = (array) => {
  array.forEach((tank) => {
    console.log('działam');
    const divElement = document.createElement('div');

    const pName = document.createElement('p');
    pName.textContent = tank.name;
    divElement.appendChild(pName);

    const pImg = document.createElement('img');
    pImg.setAttribute('src', tank.url);
    divElement.appendChild(pImg);

    const pType = document.createElement('p');
    pType.textContent = tank.type;
    divElement.appendChild(pType);

    const pMass = document.createElement('p');
    pMass.textContent = tank.mass;
    divElement.appendChild(pMass);

    const pMax_vel = document.createElement('p');
    pMax_vel.textContent = tank.max_vel;
    divElement.appendChild(pMax_vel);

    const pNationality = document.createElement('p');
    pNationality.textContent = tank.nationality;
    divElement.appendChild(pNationality);

    const pYear = document.createElement('p');
    pYear.textContent = tank.year;
    divElement.appendChild(pYear);

    container.appendChild(divElement);
  });
};

xmlButton.addEventListener('click', () => {
  container.innerHTML = '';
  showTank(doneTanks);
});

typeButtons.forEach((button) => {
  button.addEventListener('click', () => {
    container.innerHTML = '';
    const data = button.dataset.type;
    const filteredTanks = doneTanks.filter((tank) => tank.type === data);
    showTank(filteredTanks);
  });
});
form.addEventListener('submit', (e) => {
  e.preventDefault();
  container.innerHTML = '';
  const text = formInput.value;
  formInput.value = '';

  if (text === 'tanks') {
    showTank(doneTanks);
  } else if (text === 'light_tanks') {
    showTank(doneTanks.filter((tank) => tank.type === 'Light tank'));
  } else if (text === 'medium_tanks') {
    showTank(doneTanks.filter((tank) => tank.type === 'Medium tank'));
  } else if (text === 'heavy_tanks') {
    showTank(doneTanks.filter((tank) => tank.type === 'Heavy tank'));
  } else {
    const findingElements = [...file.getElementsByTagName(text)];
    findingElements.forEach((tank) => {
      const divElement = document.createElement('div');
      divElement.textContent = tank.innerHTML;
      container.appendChild(divElement);
    });
  }

  console.log(text);
});
