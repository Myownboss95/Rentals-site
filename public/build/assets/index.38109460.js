import{_ as N,c as u,i as D,x as I,A as L,r as E,a as c,b as r,d as i,e as s,u as e,G as H,t as d,j as Z,B as R,w as G,F as f,g as T,N as M,O as q,L as B,E as J}from"./main.bac42695.js";import{b as K}from"./breadcrumb.2d4cfefa.js";import{_}from"./FormGroup.1462db17.js";import{_ as F}from"./FormSelect.55ec0df3.js";import{_ as Q}from"./FormButton.0cc94290.js";import{_ as W}from"./ButtonLoader.0bb0d3b3.js";import"./error.34acba4a.js";import"./FormInput.c5b264e0.js";const n=m=>(M("data-v-0ae13ab8"),m=m(),q(),m),X={class:"row"},Y={class:"col-xl-9 col-lg-8 mx-auto"},ss={class:"card"},es={class:"card-body"},ts={class:"row"},os={class:"col-sm order-2 order-sm-1"},ls={class:"d-flex align-items-start mt-3 mt-sm-0"},as={class:"flex-shrink-0"},ds={class:"avatar-xl me-3 mr-3"},ns=["src"],is={class:"flex-grow-1"},cs={class:"ml-3"},rs={class:"font-size-16 mb-1"},_s={class:"text-muted font-size-13"},ms=n(()=>s("ul",{class:"nav nav-tabs-custom card-header-tabs border-top mt-4",id:"pills-tab",role:"tablist"},[s("li",{class:"nav-item"},[s("a",{class:"nav-link px-3 active","data-bs-toggle":"tab",href:"#overview",role:"tab"},"Bio")]),s("li",{class:"nav-item"},[s("a",{class:"nav-link px-3","data-bs-toggle":"tab",href:"#about",role:"tab"},"Transactions")]),s("li",{class:"nav-item"},[s("a",{class:"nav-link px-3","data-bs-toggle":"tab",href:"#kyc",role:"tab"},"Referrals")])],-1)),us={class:"tab-content"},hs={class:"tab-pane active",id:"overview",role:"tabpanel"},ps={class:"card"},bs=n(()=>s("div",{class:"card-header"},[s("h5",{class:"card-title mb-0"},"Bio")],-1)),vs={class:"card-body"},fs={class:"pb-3"},ys={class:"row"},gs={class:"col-xl"},xs={class:"text-muted"},Vs=["onSubmit"],ws={class:"row"},ks={class:"row mt-4"},Cs={class:"row mt-4"},zs={class:"row mt-4"},Ss={class:"row mt-4"},js=n(()=>s("h6",null,"Referral Code",-1)),Us={class:"col-md-6"},Ps={class:"row"},Rs={class:"col-7 border p-1"},Ts={class:"font-size-16 my-1"},Bs={class:"col-5 border p-1 ref"},Fs=n(()=>s("i",{class:"fa fa-copy"},null,-1)),Os=n(()=>s("strong",null," Click to Copy",-1)),$s=[Fs,Os],As={class:"d-flex justify-content-center mt-3"},Ns={class:"tab-pane",id:"about",role:"tabpanel"},Ds={class:"card"},Is=n(()=>s("div",{class:"card-header"},[s("h5",{class:"card-title mb-0"},"Transactions")],-1)),Ls={class:"card-body"},Es={class:"pb-3"},Hs={key:0},Zs={class:"table-responsive"},Gs={class:"table mb-0"},Ms=n(()=>s("thead",{class:"table-light"},[s("tr",null,[s("th",null,"Reference"),s("th",null,"Amount"),s("th",null,"Type"),s("th",null,"Status")])],-1)),qs={key:1},Js=n(()=>s("span",{class:"ms-1 text-muted font-size-13"},"No Transactions to Display",-1)),Ks=[Js],Qs={class:"tab-pane",id:"kyc",role:"tabpanel"},Ws={class:"card"},Xs=n(()=>s("div",{class:"card-header"},[s("h5",{class:"card-title mb-0"},"Referrals")],-1)),Ys={class:"card-body"},se={class:"row justify-content-center"},ee={class:"row"},te={class:"col-md-5 col-sm-12 border p-1"},oe={class:"font-size-16 my-1"},le={class:"col-md-3 col-sm-12 border p-1 ref"},ae=n(()=>s("i",{class:"fa fa-copy"},null,-1)),de=n(()=>s("strong",null," Click to Copy",-1)),ne=[ae,de],ie={class:"pb-3"},ce={key:0},re={class:"table-responsive"},_e={class:"table mb-0"},me=n(()=>s("thead",{class:"table-light"},[s("tr",null,[s("th",null,"Reference"),s("th",null,"Amount")])],-1)),ue={key:1},he=n(()=>s("span",{class:"ms-1 text-muted font-size-13"},"No Transactions to Display",-1)),pe=[he],be={name:"index",props:{user:Object,countries:Object,transactions:Object,hostname:Object,referrals:Object},setup(m){var V,w,k,C,z,S,j,U,P;const a=m,h=u(()=>a.user),O=u(()=>a.countries),y=u(()=>a.transactions),g=u(()=>a.referrals),p=u(()=>a.hostname),l=D({first_name:((V=a.user)==null?void 0:V.first_name)||"",last_name:((w=a.user)==null?void 0:w.last_name)||"",phone:((k=a.user)==null?void 0:k.phone)||"",country:((C=a.user)==null?void 0:C.country)||"",state:((z=a.user)==null?void 0:z.state)||"",city:((S=a.user)==null?void 0:S.city)||"",address:((j=a.user)==null?void 0:j.address)||"",zip_code:((U=a.user)==null?void 0:U.zip_code)||"",referral_code:((P=a.user)==null?void 0:P.referral_code)||""});let x=I({});L(()=>l.country,b=>{b!=""&&J.get(B("location.states",{country:a.countries[b]})).then(o=>{if(o.status==200)x.value=o.data.states;else throw Error()}).catch(o=>{o("Failed to load states, please refresh this page")})});const $=()=>{l.post(B("user.profile.update"))};return(b,o)=>{const A=E("Head");return c(),r(f,null,[i(A,{title:"Profile"}),i(K,{title:"Profile",crumbs:["Dashboard","Profile"]}),s("div",X,[s("div",Y,[s("div",ss,[s("div",es,[s("div",ts,[s("div",os,[s("div",ls,[s("div",as,[s("div",ds,[s("img",{src:e(H)(e(h).image),alt:"",class:"rounded-circle header-profile-user mr-1",style:{width:"80px",height:"80px"}},null,8,ns)])]),s("div",is,[s("div",cs,[s("h5",rs,d(e(h).first_name)+" "+d(e(h).last_name),1),s("p",_s,d(e(h).email),1)])])])])]),ms])]),s("div",us,[s("div",hs,[s("div",ps,[bs,s("div",vs,[s("div",null,[s("div",fs,[s("div",ys,[s("div",gs,[s("div",xs,[s("form",{class:"py-3 px-2",onSubmit:Z($,["prevent"])},[s("div",ws,[i(_,{class:"col-md-6",placeholder:"First name",label:"First name",modelValue:e(l).first_name,"onUpdate:modelValue":o[0]||(o[0]=t=>e(l).first_name=t),name:"first_name"},null,8,["modelValue"]),i(_,{class:"col-md-6",placeholder:"Last name",label:"Last name",modelValue:e(l).last_name,"onUpdate:modelValue":o[1]||(o[1]=t=>e(l).last_name=t),name:"last_name"},null,8,["modelValue"])]),s("div",ks,[i(_,{class:"col-md-6",placeholder:"Phone",label:"Phone number",modelValue:e(l).phone,"onUpdate:modelValue":o[2]||(o[2]=t=>e(l).phone=t),name:"phone"},null,8,["modelValue"]),i(F,{class:"col-md-6",placeholder:"Country",label:"Country",modelValue:e(l).country,"onUpdate:modelValue":o[3]||(o[3]=t=>e(l).country=t),name:"country",options:e(O)},null,8,["modelValue","options"])]),s("div",Cs,[i(F,{class:"col-md-6",placeholder:"State/Region",label:"State/Region",modelValue:e(l).state,"onUpdate:modelValue":o[4]||(o[4]=t=>e(l).state=t),name:"state",options:e(x)},null,8,["modelValue","options"]),i(_,{class:"col-md-6",placeholder:"City/Town",label:"City/Town",modelValue:e(l).city,"onUpdate:modelValue":o[5]||(o[5]=t=>e(l).city=t),name:"city"},null,8,["modelValue"])]),s("div",zs,[i(_,{class:"col-md-8",placeholder:"Address",label:"Address",modelValue:e(l).address,"onUpdate:modelValue":o[6]||(o[6]=t=>e(l).address=t),name:"address"},null,8,["modelValue"]),i(_,{class:"col-md-4",placeholder:"Postal/Zip code",label:"Postal/Zip code",modelValue:e(l).zip_code,"onUpdate:modelValue":o[7]||(o[7]=t=>e(l).zip_code=t),name:"zip_code"},null,8,["modelValue"])]),s("div",Ss,[js,s("div",Us,[s("div",Ps,[s("div",Rs,[s("strong",Ts,d(e(p))+"ref/"+d(e(l).referral_code),1)]),s("div",Bs,[s("span",{class:"ml-2",onClick:o[8]||(o[8]=t=>e(R)("https://"+e(p)+"ref/"+e(l).referral_code))},$s)])])])]),s("div",As,[i(Q,{class:"btn btn-primary px-5",type:"submit",disable:e(l).processing},{default:G(()=>[i(W,{text:"Submit",loading:e(l).processing},null,8,["loading"])]),_:1},8,["disable"])])],40,Vs)])])])])])])])]),s("div",Ns,[s("div",Ds,[Is,s("div",Ls,[s("div",null,[s("div",Es,[e(y).length?(c(),r("div",Hs,[s("div",Zs,[s("table",Gs,[Ms,s("tbody",null,[(c(!0),r(f,null,T(e(y),(t,v)=>(c(),r("tr",{key:v},[s("td",null,d(t.reference),1),s("td",null,d(t.amount),1),s("td",null,d(t.type),1),s("td",null,d(t.status),1)]))),128))])])])])):(c(),r("div",qs,Ks))])])])])]),s("div",Qs,[s("div",Ws,[Xs,s("div",Ys,[s("div",null,[s("div",se,[s("div",ee,[s("div",te,[s("strong",oe,d(e(p))+"ref/"+d(e(l).referral_code),1)]),s("div",le,[s("span",{class:"ml-2",onClick:o[9]||(o[9]=t=>e(R)("https://"+e(p)+"ref/"+e(l).referral_code))},ne)])]),s("div",ie,[e(g).length?(c(),r("div",ce,[s("div",re,[s("table",_e,[me,s("tbody",null,[(c(!0),r(f,null,T(e(g),(t,v)=>(c(),r("tr",{key:v},[s("td",null,d(t.last_name?t.last_name:"-")+" "+d(t.first_name?t.first_name:"-"),1),s("td",null,d(t.email),1)]))),128))])])])])):(c(),r("div",ue,pe))])])])])])])])])])],64)}}};var Ce=N(be,[["__scopeId","data-v-0ae13ab8"]]);export{Ce as default};
