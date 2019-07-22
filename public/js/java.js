var eliminar= document.queryselector('.borrar');



var fToUnF=document.queryselector('.follow');
  fToUnF.onclick=function(){
  fToUnF.setAttribute('class','unfollow');
  fToUnF.setAttribute('action','/unfollow/{{$user->id}}');
  var text=document.createTextNode('Dejas de Seguir');
  fToUnF.append(text);
  return fToUnF;

}
var unToF=document.queryselector('.follow');
  unToF.onclick=function(){
  unToF.setAttribute('class','follow');
  unToF.setAttribute('action','/follow/{{$user->id}}');
  var text=.document.createTextNode('Seguir');
  unToF.append(text);
  return unToF;
}
var unFi= document.queryselector('input[tipe=file]');
console.log(unfi);
