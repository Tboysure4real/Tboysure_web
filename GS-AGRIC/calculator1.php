<!DOCTYPE html>
<html lang="en">
 
<head>
  <meta charset="UTF-8">
  <title>Neumorphism calculator design</title>
  <link rel="stylesheet" href="./style.css">

<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat&display=swap');
 
body {
  background: #dde1e7;
  font-family: arial;
}
.box {
  background: #dde1e7;
  width: 350px;
  height: 550px;
  border-radius: .5em;
  box-shadow: -3px -3px 7px blue,
              2px 2px 5px rgba(94, 104, 121, 0.288);
  margin: 0 auto;
  padding: 25px 28px;
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  
}
.box .result {
  width: 100%;
  height: 180px;
  box-shadow: 4px 4px 8px #babecc,
              -10px -10px 15px blue;
  
}
.box .result p {
  font-size: 40pt;
  overflow-y: auto;
  text-align: right;
 
}
 
.box .keys {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  grid-gap: 1em;
}
.box .keys .button, .box .keys .Numberkeys  {
  cursor: grab;
  text-align: center;
  width: 70px;
  font-size:18px;
  height: 50px;
  display: grid;
  place-content: center;
  border-radius: 50%;
  box-shadow: 24px 4px 8px #babecc,
              -10px -10px 15px blue;
}
.button:hover{
  color: green;
 
 
}
 
 
/*  UTILITIES*/
.box .keys .zero {
  grid-column: 1/ 3;
  width: 100%;
  font-size:18px;
  border-radius: 10px;
  box-shadow: 4px 4px 8px #babecc,
              -10px -10px 15px blue;
}
 
 
.resultButton {
  color: grey;
  font-weight: bold;
}
.calc-resultButton{
  color: #ed11d7;
  font-size: 20px;
  font-weight: bold;
}
</style>
</head>
 
<body>
<a href="dashboard.php" class="active-tab dashboard-tab"><button type="button">Dashboard</button></a>
<a href="view_items_available.php" class="active-tab dashboard-tab"><button type="button"> View Items</button></a>


	
  <div class="box">
    <div class="result">
      <p id="result-box">0</p>
    </div>
    <div class="keys">
      <div class="button resultButton" id="clear"> AC </div>
      <div class="button resultButton"> MC</div>
      <div class="button Numberkeys  resultButton"> %</div>
      <div class="button Numberkeys  calc-resultButton"> /</div>
      <div class="button Numberkeys seven">7</div>
      <div class="button Numberkeys eight">8</div>
      <div class="button Numberkeys  nine">9</div>
      <div class="button Numberkeys  calc-resultButton">*</div>
      <div class="button Numberkeys  four">4</div>
      <div class="button Numberkeys  five">5</div>
      <div class="button Numberkeys  six">6</div>
      <div class="button Numberkeys  calc-resultButton">-</div>
      <div class="button Numberkeys  one">1</div>
      <div class="button Numberkeys  two">2</div>
      <div class="button Numberkeys  three">3</div>
      <div class="button Numberkeys  calc-resultButton">+</div>
      <div class="button Numberkeys  zero">0</div>
      <div class="button Numberkeys  point">.</div>
      <div class="button calc-resultButton" id="total">=</div>
    </div>
  </div> 
  <script>
let btns = document.querySelectorAll(".Numberkeys");
let allBtns = document.querySelectorAll(".button");
let resultBox = document.querySelector("#result-box");
let clearBtn = document.querySelector('#clear');
 
let total = document.querySelector("#total");
 
let btnSpread = [...btns];
let allBtnSpread = [...allBtns];
 
// For Number Inputs
btnSpread.forEach((button, i) => {
  button.addEventListener("click", () => {
    // Inner Values for calculator
 
    if (resultBox.innerHTML == "0") {
      resultBox.innerHTML = "";
    }
 
    let value = btns[i].innerHTML;
    resultBox.innerHTML += value;
  });
});
 
 
// Function to evalute Strings
function evaluate(fn) {
    return new Function('return ' + fn)();
}
 
// To calculate All Input
total.addEventListener('click', ()=> {
let allInputs = resultBox.innerHTML;
 
resultBox.innerHTML = evaluate(allInputs);
 
console.log(evaluate(allInputs));
})
 
// Clear all Inputs
clearBtn.addEventListener('click', ()=> {
    resultBox.innerHTML = "0";
})
 
 
</script>
 
</body>
 
</html>