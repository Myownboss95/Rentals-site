import{b as y}from"./breadcrumb.263af8c3.js";import{c as d,r as _,a as e,b as s,d as n,e as t,w as u,u as a,F as h,g as v,n as x,E as B,t as m,m as w,h as p}from"./main.378c769e.js";import{_ as N}from"./paginator.a08364ef.js";const C={class:"card radius-20 shadow-lg col-lg-6 mx-auto"},T={class:"card-body"},V={class:"text-start"},L=t("i",{class:"fa fa-arrow-left"},null,-1),$=p(" Back "),j={class:"table-responsive"},D={class:"table",style:{"vertical-align":"middle"}},E=t("thead",null,[t("tr",null,[t("th",null,"User"),t("th",null,"Bot Name"),t("th",null,"Actions")])],-1),F={key:0},H=["src"],I=t("i",{class:"fa fa-key"},null,-1),A=p(" Create token "),O={key:1},S={key:1},U=t("tr",null,[t("td",{colspan:"9",class:"text-muted text-center"},"No activation request yet")],-1),q=[U],z={key:0,class:"d-flex justify-content-center"},P={name:"activation",props:{requests:Object},setup(b){const l=b;console.log(l);const f=d(()=>l.requests.links),r=d(()=>l.requests.data);return(i,G)=>{const k=_("Head"),c=_("InertiaLink");return e(),s(h,null,[n(k,{title:"Trade Bots"}),n(y,{title:"Trade Bots",crumbs:["Dashboard","Trading","Trade Bots"]}),t("div",C,[t("div",T,[t("div",V,[n(c,{href:i.route("admin.bots.index"),class:"mb-3 ms-2 fw-bolder"},{default:u(()=>[L,$]),_:1},8,["href"])]),t("div",j,[t("table",D,[E,a(r).length?(e(),s("tbody",F,[(e(!0),s(h,null,v(a(r),(o,g)=>(e(),s("tr",{key:g},[t("td",null,[t("img",{src:a(B)(o.image),style:{width:"50px",height:"50px","border-radius":"50%","margin-right":"20px"},alt:""},null,8,H),t("span",null,m(`${o.first_name} ${o.last_name}`),1)]),t("td",null,m(o.bot_name),1),t("td",null,[o.token?(e(),s("span",O,"-- Created --")):(e(),w(c,{key:0,as:"button",method:"post",href:i.route("admin.bots.activation.token-generate",o.id),class:"btn btn-outline-primary btn-sm"},{default:u(()=>[I,A]),_:2},1032,["href"]))])]))),128))])):(e(),s("tbody",S,q))])]),a(r).length?(e(),s("div",z,[n(N,{links:a(f)},null,8,["links"])])):x("",!0)])])],64)}}};export{P as default};