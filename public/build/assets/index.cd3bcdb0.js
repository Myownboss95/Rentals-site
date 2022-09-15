import{b as x}from"./breadcrumb.8f552bf8.js";import{_ as C}from"./paginator.b2f2e723.js";import{c as _,i as D,r as A,a as s,b as n,d as i,e as t,u as l,F as h,g as B,n as N,t as o,h as m}from"./main.1d6adac6.js";const V={class:"card shadow col-lg-10 mx-auto"},F={class:"card-body"},S={class:"table-responsive"},W={class:"table"},$=t("thead",null,[t("tr",null,[t("th",null,"User"),t("th",null,"Reference"),t("th",null,"Amount"),t("th",null,"Status"),t("th",null,"Date"),t("th",null,"Actions")])],-1),j={key:0},H={key:0},w=["onClick"],E=t("i",{class:"fa fa-check"},null,-1),L=m(" Approve "),O=[E,L],R=["onClick"],T=t("i",{class:"fa fa-times"},null,-1),U=m(" Decline "),q=[T,U],z={key:1},G=t("p",null,"-- --",-1),I=[G],J={key:1},K=t("tr",null,[t("td",{colspan:"10",class:"text-muted text-center"},"No withdrawals found")],-1),M=[K],P={key:0,class:"d-flex justify-content-center"},tt={name:"index",props:{withdrawals:Object},setup(p){const r=p,a=_(()=>r.withdrawals.data),f=_(()=>r.withdrawals.links),d=D({}),b=c=>{d.post(route("admin.withdrawals.approve",c),{onBefore:()=>confirm("Are you sure you want approve this withdrawal?")})},k=c=>{d.post(route("admin.withdrawals.decline",c),{onBefore:()=>confirm("Are you sure you want decline this withdrawal?")})};return(c,Q)=>{const y=A("Head");return s(),n(h,null,[i(y,{title:"Withdrawals"}),i(x,{title:"Withdrawals",crumbs:["Dashboard","Withdrawals"]}),t("div",V,[t("div",F,[t("div",S,[t("table",W,[$,l(a).length?(s(),n("tbody",j,[(s(!0),n(h,null,B(l(a),(e,v)=>{var u;return s(),n("tr",{key:v},[t("td",null,o((u=e==null?void 0:e.user)==null?void 0:u.first_name),1),t("td",null,o(e.reference),1),t("td",null,o(e.amount)+" "+o(e.symbol),1),t("td",null,o(e.status),1),t("td",null,o(new Date(e.created_at).toDateString()),1),t("td",null,[e.status=="pending"?(s(),n("div",H,[t("span",{onClick:g=>b(e.id),class:"btn btn-outline-success btn-sm cursor-pointer me-2"},O,8,w),t("span",{onClick:g=>k(e.id),class:"btn btn-outline-danger btn-sm cursor-pointer"},q,8,R)])):(s(),n("div",z,I))])])}),128))])):(s(),n("tbody",J,M))])]),l(a).length?(s(),n("div",P,[i(C,{links:l(f)},null,8,["links"])])):N("",!0)])])],64)}}};export{tt as default};
