import{b as D}from"./breadcrumb.8f552bf8.js";import{_ as x}from"./paginator.b2f2e723.js";import{c as m,r as d,a as e,b as s,d as l,e as n,u as c,F as i,g as N,n as w,t as a,w as f,h as b}from"./main.1d6adac6.js";const V={class:"card shadow col-lg-10 mx-auto"},A={class:"card-body"},B={class:"table-responsive"},C={class:"table"},L=n("thead",null,[n("tr",null,[n("th",null,"User"),n("th",null,"Reference"),n("th",null,"Amount"),n("th",null,"Status"),n("th",null,"Date"),n("th",null,"Actions")])],-1),S={key:0},j={key:0},F=n("i",{class:"fa fa-check"},null,-1),H=b(" Approve "),I=n("i",{class:"fa fa-times"},null,-1),E=b(" Decline "),O={key:1},R={key:1},T=n("tr",null,[n("td",{colspan:"10",class:"text-muted text-center"},"No deposits found")],-1),U=[T],$={key:0,class:"d-flex justify-content-center"},K={name:"index",props:{deposits:Object},setup(k){const o=k,r=m(()=>o.deposits.data),y=m(()=>o.deposits.links);return(u,q)=>{const v=d("Head"),_=d("InertiaLink");return e(),s(i,null,[l(v,{title:"Deposits"}),l(D,{title:"Deposits",crumbs:["Dashboard","Deposits"]}),n("div",V,[n("div",A,[n("div",B,[n("table",C,[L,c(r).length?(e(),s("tbody",S,[(e(!0),s(i,null,N(c(r),(t,g)=>{var h;return e(),s("tr",{key:g},[n("td",null,a((h=t==null?void 0:t.user)==null?void 0:h.first_name),1),n("td",null,a(t==null?void 0:t.reference),1),n("td",null,a(t==null?void 0:t.amount)+" "+a(t==null?void 0:t.symbol),1),n("td",null,a(t==null?void 0:t.status),1),n("td",null,a(new Date(t==null?void 0:t.created_at).toDateString()),1),n("td",null,[t.status=="pending"?(e(),s("div",j,[l(_,{href:u.route("admin.deposits.approve",t==null?void 0:t.id),class:"btn btn-outline-success btn-sm me-2"},{default:f(()=>[F,H]),_:2},1032,["href"]),l(_,{href:u.route("admin.deposits.decline",t==null?void 0:t.id),class:"btn btn-outline-danger btn-sm"},{default:f(()=>[I,E]),_:2},1032,["href"])])):(e(),s("div",O," -- "))])])}),128))])):(e(),s("tbody",R,U))])]),c(r).length?(e(),s("div",$,[l(x,{links:c(y)},null,8,["links"])])):w("",!0)])])],64)}}};export{K as default};
