import{a as m,b as u,s as l,v as n,d as a,e as i,w as s,t as r,q as c}from"./main.1d6adac6.js";import{_ as f,a as y}from"./error.b14e92fc.js";import{_ as g}from"./FormInput.3a0f17ec.js";import{_ as b}from"./FormButton.8e5ba5c0.js";const p={class:"input-group auth-pass-inputgroup"},$={name:"InputGroup",props:{type:{type:String},name:{type:String},text:{type:String},label:{type:String},icon:{type:String},placeholder:{type:String,default:"Enter Password"},id:{type:String},modelValue:null},emits:["update:modelValue","buttonClicked"],setup(e){return(o,t)=>(m(),u("div",null,[l(a(f,{label:e.label,for:e.id},null,8,["label","for"]),[[n,e.label]]),i("div",p,[a(g,{type:e.type,id:e.id,name:e.name,placeholder:e.placeholder,modelValue:e.modelValue,"onUpdate:modelValue":t[0]||(t[0]=d=>o.$emit("update:modelValue",d))},null,8,["type","id","name","placeholder","modelValue"]),a(b,{class:"btn btn-light shadow-none ms-0",type:"button",onButtonClicked:t[1]||(t[1]=()=>o.$emit("buttonClicked"))},{default:s(()=>[l(i("span",null,r(e.text),513),[[n,e.text!="undefined"||e.text.length]]),l(i("i",{class:c(e.icon)},null,2),[[n,e.icon]])]),_:1})]),a(y,{name:e.name},null,8,["name"])]))}};export{$ as _};
