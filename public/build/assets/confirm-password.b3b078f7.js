import{i as u,a as m,b as p,e as s,j as _,d as o,u as a,w as i,k as f,l as h,h as w}from"./main.1d6adac6.js";import{_ as v}from"./FormGroup.7266046e.js";import{_ as n}from"./FormButton.8e5ba5c0.js";import{_ as b}from"./ButtonLoader.fcac1798.js";import"./error.b14e92fc.js";import"./FormInput.3a0f17ec.js";const x={class:"auth-content my-auto"},y={class:"text-center"},g=s("div",{class:"avatar-xl mx-auto"},[s("div",{class:"avatar-title bg-soft-light text-primary h1 rounded-circle"},[s("i",{class:"bx bxs-user"})])],-1),k={class:"mt-4 pt-2"},V=s("h5",null,"Confirm you are you!",-1),B=s("p",{class:"text-center"}," You need to enter your password as the action you about to perform requires security clearance. ",-1),C={class:"mt-4"},N=["onSubmit"],P={class:"mt-5 text-center"},$={class:"text-muted mb-0"},E=w(" Or cancel and go back "),O={name:"confirm-password",setup(S){const t=u({password:""}),c=()=>{t.post(route("password.confirm"),{replace:!0})},l=()=>{let e=f().props.value.url.previous;e!=null&&e!=""?h.Inertia.visit(e,{replace:!0}):window.history.back()};return(e,r)=>(m(),p("div",x,[s("div",y,[g,s("div",k,[V,B,s("div",C,[s("form",{onSubmit:_(c,["prevent"])},[o(v,{placeholder:"Enter your password",name:"password",modelValue:a(t).password,"onUpdate:modelValue":r[0]||(r[0]=d=>a(t).password=d),type:"password"},null,8,["modelValue"]),o(n,{class:"btn btn-primary w-100 waves-effect waves-light",type:"submit"},{default:i(()=>[o(b,{loading:a(t).processing,text:"Confirm Password"},null,8,["loading"])]),_:1})],40,N)])])]),s("div",P,[s("p",$,[o(n,{class:"btn btn-outline-warning",onButtonClicked:l},{default:i(()=>[E]),_:1})])])]))}};export{O as default};
