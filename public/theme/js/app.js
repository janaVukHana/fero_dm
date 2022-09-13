// set current year on footer copyright
const copyRightYear = document.querySelector('.copyright-year');
const date = new Date();

copyRightYear.innerHTML = date.getFullYear();

