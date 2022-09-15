import{b as k}from"./breadcrumb.8f552bf8.js";import{_ as y,i as z,K as m,c as u,A as $,r as f,a as d,b as c,d as a,e as s,u as t,F as b,g as V,E as S,t as l,q as A,w as N,L as U,N as D,h as I}from"./main.1d6adac6.js";import{_ as j}from"./FormInput.3a0f17ec.js";import{_ as B}from"./FormSelect.c1e34be0.js";import{_ as C}from"./paginator.b2f2e723.js";import"./error.b14e92fc.js";const i=n=>(U("data-v-670f3fca"),n=n(),D(),n),E={class:"col-lg-11 mx-auto"},F={class:"w-100 mb-3 d-flex justify-content-between"},L={class:"col-sm-6 col-md-3"},H={class:"col-sm-6 col-md-2"},P={key:0},q={class:"card-body"},K={class:"row align-items-center"},M={class:"col-xl-3 col-lg-6 col-sm-12 d-flex mb-sm-2"},T={class:"user-img-wrapper me-sm-4 me-3"},G=["src"],J={class:"media-body"},O={class:"d-blockn font-size-12"},Q={class:"col-xl-3 col-lg-3 col-sm-4 col-6 mb-3"},R=i(()=>s("small",{class:"mb-2 d-block font-size-12 fw-bold"},"Address",-1)),W={class:"font-size-12"},X={class:"col-xl-2 col-lg-3 col-sm-4 col-6 mb-3 text-lg-center"},Y=i(()=>s("small",{class:"mb-2 d-block font-size-12 fw-bold"},"Phone Number",-1)),Z={class:"font-size-12"},ss={class:"col-xl-2 col-lg-6 col-sm-4 mb-sm-3 mb-3"},es=i(()=>s("small",{class:"mb-2 d-block font-size-12 fw-bold"},"Email Address",-1)),ts={class:"font-size-12"},os={class:"col-xl-2 col-md-12 col-lg-6 col-sm-12 mb-sm-4 mb-0"},as=i(()=>s("hr",{class:"d-md-none mt-0"},null,-1)),ls={class:"d-flex justify-content-between items-center my-auto"},ns={class:"dropdown ms-4"},ds=i(()=>s("div",{class:"btn-link","data-bs-toggle":"dropdown"},[s("i",{class:"fa fa-cog font-size-20"})],-1)),cs={class:"dropdown-menu dropdown-menu-right"},is=I("Login As"),rs={class:"w-100 pb-3 d-flex justify-content-center"},_s={key:1,class:"text-center pt-5 pb-5 border rounded text-muted"},ms={name:"index",props:["users"],setup(n){const p=n,o=z({status:m().params.status||"all",search:m().params.search||""}),h=u(()=>p.users.data),v=u(()=>p.users.links);return $(()=>o.data(),()=>{o.transform(r=>(r.search==""&&delete r.search,r)).get(m("admin.users.index"),{preserveState:!0})}),(r,_)=>{const g=f("Head"),x=f("inertia-link");return d(),c(b,null,[a(g,{title:"Users"}),a(k,{title:"Users",crumbs:["Dashboard","Users"]}),s("div",E,[s("div",F,[s("div",L,[a(j,{placeholder:"Search...",modelValue:t(o).search,"onUpdate:modelValue":_[0]||(_[0]=e=>t(o).search=e),modelModifiers:{lazy:!0}},null,8,["modelValue"])]),s("div",H,[a(B,{name:"search",modelValue:t(o).status,"onUpdate:modelValue":_[1]||(_[1]=e=>t(o).status=e),options:{all:"All",active:"Active",pending:"Pending",suspended:"Suspended"}},null,8,["modelValue"])])]),t(h).length?(d(),c("div",P,[(d(!0),c(b,null,V(t(h),(e,w)=>(d(),c("div",{class:"card shadow rounded-lg",key:w},[s("div",q,[s("div",K,[s("div",M,[s("span",T,[s("img",{class:"h-100 w-100",src:t(S)(e.image),width:"95"},null,8,G)]),s("div",J,[s("h6",null,l(`${e.first_name} ${e.last_name}`),1),s("span",O,l(new Date(e.created_at).toDateString()),1)])]),s("div",Q,[R,s("span",W,l(`${e.address}. ${e.city}, ${e.state}, ${e.zip_code}, ${e.country}.`),1)]),s("div",X,[Y,s("span",Z,l(e.phone),1)]),s("div",ss,[es,s("span",ts,l(e.email),1)]),s("div",os,[as,s("div",ls,[s("h4",{class:A(["badge rounded-pill my-auto font-size-18",{"text-danger":e.status=="suspended","text-success":e.status=="active","text-info":e.status=="pending"}])},l(e.status),3),s("div",ns,[ds,s("div",cs,[a(x,{class:"dropdown-item",as:"button",method:"post",href:t(m)("login-as",e.id)},{default:N(()=>[is]),_:2},1032,["href"])])])])])])])]))),128)),s("div",rs,[a(C,{links:t(v)},null,8,["links"])])])):(d(),c("div",_s," No users found "))])],64)}}};var gs=y(ms,[["__scopeId","data-v-670f3fca"]]);export{gs as default};
