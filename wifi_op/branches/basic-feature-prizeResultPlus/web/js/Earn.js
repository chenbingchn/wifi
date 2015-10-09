function test(a){
    window.intent.chooseIntent(a);
}
function EarnPoins(){
    document.getElementById('button').style.backgroundColor='rgba(0,0,0,0.1)';
    window.setTimeout('EarnPoint()',100);
}
function EarnPoint(){
    document.getElementById('button').style.backgroundColor='rgba(0,0,0,0)';
    window.intent.goToEarnPoins();
}
function integral(a){
    var b=a;
    document.getElementById('integral').innerHTML=b;
}
function colorb(x,i)
{
    var t=i;
    var col=x;
    var x=document.getElementById('list'+x);
    x.style.backgroundColor="#e2e1e1";
    window.setTimeout('b('+col+')',10);
    window.setTimeout('test('+t+')',20);
}
function b(clo) {
    var t=clo;
    var clo=document.getElementById('list'+clo);
    clo.style.backgroundColor = '#ffffff';
}
function buttono(){
    document.getElementById('left').src='images/Blackleft.png';
    window.setTimeout('buttonf()',200);
}

function buttonf(){
    document.getElementById('left').src='images/Left.png';
    window.location.href="backapp://back";
}
function ToLogin(){
    //document.getElementById('button').style.backgroundColor='rgba(0,0,0,0)';
    window.intent.goToLogin();
}