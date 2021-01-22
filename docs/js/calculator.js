totalNum = 0;	// 合計値
inputNum = "";	// 現在入力している値
inputOperator = "";	// 入力された演算子
isOperator = true;	// １回前に入力したものは演算子かどうか

//数値と小数点ボタン入力時の処理
function pushValue(inputData){	
    if(inputData == "." && ~inputNum.indexOf(".")){return;}
    if(inputData != "." && inputNum =="0"){
        inputNum = "";
    }
    isOperator = false;
    inputNum += inputData;
    document.calcForm.calcResult.value = inputNum;
    document.calcForm.clearButton.value ="C";　//クリアボタンをCに切り替え
}	

//演算子ボタン入力時の処理
function pushOperator(inputData){
    //計算	
    if (!isOperator){
        isOperator = true;
        if(!inputOperator){inputOperator = "+";}
        totalNum = eval(totalNum + inputOperator + inputNum);
        inputNum = "";
        document.calcForm.calcResult.value = totalNum;
    }	

    //演算子の管理
    if (inputData == "="){	
        inputOperator = "";
    }else{	
        inputOperator = inputData;	
    }	
}

//％ボタン入力時の処理
function pushPerse(){
    if(inputNum == 0){
        totalNum /= 100;
        document.calcForm.calcResult.value = totalNum;
    }else{
        inputNum /= 100;
        if(inputOperator == "+" || inputOperator == "-"){
            inputNum *= totalNum;
        }
        document.calcForm.calcResult.value = inputNum;
    }
}

//+/-ボタン入力時、現在入力値の正負を反転する
function pushMinus(){
    inputNum *= -1;
    document.calcForm.calcResult.value = inputNum;
}

//クリアボタン入力時の処理
function pushClearButton(){
    if(document.calcForm.clearButton.value == "AC"){　//AC(AllClear)
        totalNum = 0;
        inputOperator = "";
        inputNum = "";
        document.calcForm.calcResult.value = totalNum;
    }else{　//C(Clear)
        isOperator = true;
        inputNum = "0";
        document.calcForm.calcResult.value = inputNum;
    }
    document.calcForm.clearButton.value ="AC";
}
