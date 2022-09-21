import{i,A as u,r as p,a as b,b as c,d as s,e as a,j as f,u as o,w as _,F as y}from"./main.ad9e0d78.js";import{b as V}from"./breadcrumb.ee67ecd8.js";import{_ as m}from"./FormGroup.a8c140e9.js";import{_ as g}from"./FormSelect.401b31ae.js";import{_ as C}from"./FormButton.98dcac9f.js";import{_ as w}from"./ButtonLoader.554f0061.js";import"./error.15888749.js";import"./FormInput.1199fd72.js";const v={class:"col-lg-4 m-auto"},h={class:"card"},U={class:"card-body"},P=["onSubmit"],A={class:"mt-3 mb-3"},M=a("label",null,"Coin Logo",-1),S={class:"mt-3 mb-3"},x=a("label",null,"QR Code Upload",-1),H={name:"create",setup(N){const e=i({name:"",status:1,image:"",svg:"",wallet:"",price:"",symbol:"",roi:""});u(()=>e.symbol,n=>{n!=""&&(e.symbol=n.toUpperCase())});const d=()=>{e.post(route("admin.payment-method.store"))};return(n,l)=>{const r=p("Head");return b(),c(y,null,[s(r,{title:"Create Payment Method"}),s(V,{title:"Create Payment Method",crumbs:["Dashboard","Settings","Create Payment Method","Create"]}),a("div",v,[a("div",h,[a("div",U,[a("form",{onSubmit:f(d,["prevent"])},[s(m,{name:"name",placeholder:"Add Coin Name",label:"Add Coin Name",modelValue:o(e).name,"onUpdate:modelValue":l[0]||(l[0]=t=>o(e).name=t)},null,8,["modelValue"]),s(m,{name:"symbol",placeholder:"Coin Symbol",label:"Coin Symbol",modelValue:o(e).symbol,"onUpdate:modelValue":l[1]||(l[1]=t=>o(e).symbol=t),class:"mt-3"},null,8,["modelValue"]),s(g,{id:"demo",name:"type",label:"Enable/Disable",options:{1:"Enable",0:"Disable"},modelValue:o(e).status,"onUpdate:modelValue":l[2]||(l[2]=t=>o(e).status=t)},null,8,["modelValue"]),s(m,{name:"wallet",placeholder:"Wallet Address",label:"Wallet Address",modelValue:o(e).wallet,"onUpdate:modelValue":l[3]||(l[3]=t=>o(e).wallet=t),class:"mt-3"},null,8,["modelValue"]),s(m,{name:"roi",placeholder:"ROI",label:"Rewards",modelValue:o(e).roi,"onUpdate:modelValue":l[4]||(l[4]=t=>o(e).roi=t),class:"mt-3"},null,8,["modelValue"]),a("div",A,[M,a("input",{class:"form-control",type:"file",onInput:l[5]||(l[5]=t=>o(e).svg=t.target.files[0])},null,32)]),a("div",S,[x,a("input",{class:"form-control",type:"file",onInput:l[6]||(l[6]=t=>o(e).image=t.target.files[0])},null,32)]),s(C,{type:"submit",class:"w-100 btn btn-outline-primary mt-3",disabled:o(e).processing},{default:_(()=>[s(w,{text:"Create Payment Method",loading:o(e).processing},null,8,["loading"])]),_:1},8,["disabled"])],40,P)])])])],64)}}};export{H as default};