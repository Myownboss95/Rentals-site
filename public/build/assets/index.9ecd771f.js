import{b as N}from"./breadcrumb.263af8c3.js";import{o as k,f as T,c as n,r as D,a as o,b as a,d as i,u as t,H as V,e as s,t as e,F as h,g as p,w as v,h as w}from"./main.378c769e.js";const j={class:"row m-1"},O={class:"p-2 col-md-3 col-sm-12"},R={class:"card shadow"},U={class:"card-body"},S={class:"row align-items-center"},z={class:"col-6"},A=s("span",{class:"text-muted mb-3 lh-1 d-block text-truncate"},"Total Users",-1),B={class:"mb-3"},F={class:"counter-value","data-target":"{{user_count}}"},C=s("div",{class:"col-6"},[s("i",{"data-feather":"users",class:"feather-50"})],-1),H={class:"p-2 col-md-3 col-sm-12"},L={class:"card shadow"},W={class:"card-body"},E={class:"row align-items-center"},M={class:"col-6"},$=s("span",{class:"text-muted mb-3 lh-1 d-block"},"Total Deposits",-1),q={class:"mb-3"},G={class:"counter-value","data-target":"{{deposits_count}}"},I=s("div",{class:"col-6"},[s("i",{"data-feather":"dollar-sign",class:"feather-50"})],-1),J={class:"p-2 col-md-3 col-sm-12"},K={class:"card shadow"},P={class:"card-body"},Q={class:"row align-items-center"},X={class:"col-6"},Y=s("span",{class:"text-muted mb-3 lh-1 d-block"},"Total Stakes",-1),Z={class:"mb-3"},ss={class:"counter-value","data-target":"{{withdrawals_count}}"},ts=s("div",{class:"col-6"},[s("i",{"data-feather":"credit-card",class:"feather-50"})],-1),es={class:"row m-1"},os={class:"p-2 col-md-6 col-sm-12"},as={class:"card shadow"},cs={class:"card-body m-3"},ds={class:"row align-items-center"},ns=s("h4",{class:"mb-3"},"Recent Withdrawals",-1),ls={key:0},is={class:"table-responsive"},_s={class:"table mb-0"},rs=s("thead",{class:"table-light"},[s("tr",null,[s("th",null,"Reference"),s("th",null,"Amount"),s("th",null,"Status")])],-1),hs={key:1},us=s("span",{class:"ms-1 text-muted font-size-13"},"No Transactions to Display",-1),ms=[us],bs={class:"text-nowrap mb-2"},ps={class:"badge bg-soft-success text-success"},vs=w("View Withdrawals"),ws=s("i",{class:"mdi mdi-arrow-right ms-1"},null,-1),fs={class:"p-2 col-md-6 col-sm-12"},ys={class:"card shadow"},gs={class:"card-body m-3"},xs={class:"row align-items-center"},Ns=s("h4",{class:"mb-3"},"Recent Deposits",-1),ks={key:0},Ts={class:"table-responsive"},Ds={class:"table mb-0"},Vs=s("thead",{class:"table-light"},[s("tr",null,[s("th",null,"Reference"),s("th",null,"Amount"),s("th",null,"Status")])],-1),js={key:1},Os=s("span",{class:"ms-1 text-muted font-size-13"},"No Transactions to Display",-1),Rs=[Os],Us={class:"text-nowrap mb-2"},Ss={class:"badge bg-soft-success text-success"},zs=w("View Deposits"),As=s("i",{class:"mdi mdi-arrow-right ms-1"},null,-1),Bs={class:"p-2 col-md-12 col-sm-12"},Fs={class:"card shadow"},Cs={class:"card-body m-3"},Hs={class:"row align-items-center"},Ls=s("h4",{class:"mb-3"},"Recent Users",-1),Ws={key:0},Es={class:"table-responsive"},Ms={class:"table mb-0"},$s=s("thead",{class:"table-light"},[s("tr",null,[s("th",null,"First Name"),s("th",null,"Last Name"),s("th",null,"Username")])],-1),qs={key:1},Gs=s("span",{class:"ms-1 text-muted font-size-13"},"No Users to Display",-1),Is=[Gs],Js={class:"text-nowrap mb-2"},Ks={class:"badge bg-soft-success text-success"},Ps=w("View All Users "),Qs=s("i",{class:"mdi mdi-arrow-right ms-1"},null,-1),st={name:"index",props:{user_count:Number,users:Object,withdrawals_count:Number,withdrawals:Object,deposits_count:Number,deposits:Object,num_buyTrades:Number,buyTrades:Object,num_sellTrades:Number,sellTrades:Object},setup(x){const d=x;k(()=>{T.replace()});const u=n(()=>d.user_count),f=n(()=>d.users),_=n(()=>d.withdrawals_count),y=n(()=>d.withdrawals),r=n(()=>d.deposits_count),g=n(()=>d.deposits);return n(()=>d.num_buyTrades),n(()=>d.buyTrades),n(()=>d.num_sellTrades),n(()=>d.sellTrades),(m,Xs)=>{const b=D("inertia-link");return o(),a(h,null,[i(t(V),{title:"Dashboard"}),i(N,{title:"Dashboard",crumbs:["Dashboard"]}),s("div",j,[s("div",O,[s("div",R,[s("div",U,[s("div",S,[s("div",z,[A,s("h4",B,[s("span",F,e(t(u)),1)])]),C])])])]),s("div",H,[s("div",L,[s("div",W,[s("div",E,[s("div",M,[$,s("h4",q,[s("span",G,e(t(r)),1)])]),I])])])]),s("div",J,[s("div",K,[s("div",P,[s("div",Q,[s("div",X,[Y,s("h4",Z,[s("span",ss,e(t(_)),1)])]),ts])])])])]),s("div",es,[s("div",os,[s("div",as,[s("div",cs,[s("div",ds,[ns,t(y).length?(o(),a("div",ls,[s("div",is,[s("table",_s,[rs,s("tbody",null,[(o(!0),a(h,null,p(t(y),(c,l)=>(o(),a("tr",{key:l},[s("td",null,e(c.reference),1),s("td",null,e(c.amount),1),s("td",null,e(c.status),1)]))),128))])])])])):(o(),a("div",hs,ms))]),s("div",bs,[s("span",ps,e(!isNaN(t(_))&&t(_)!=0?t(_)-6:"0")+" more",1)]),i(b,{href:m.route("admin.withdrawals.index"),class:"btn btn-primary"},{default:v(()=>[vs,ws]),_:1},8,["href"])])])]),s("div",fs,[s("div",ys,[s("div",gs,[s("div",xs,[Ns,t(g).length?(o(),a("div",ks,[s("div",Ts,[s("table",Ds,[Vs,s("tbody",null,[(o(!0),a(h,null,p(t(g),(c,l)=>(o(),a("tr",{key:l},[s("td",null,e(c.reference),1),s("td",null,e(c.amount),1),s("td",null,e(c.status),1)]))),128))])])])])):(o(),a("div",js,Rs))]),s("div",Us,[s("span",Ss,e(!isNaN(t(r))&&t(r)!=0?t(r)-6:"0")+" more",1)]),i(b,{href:m.route("admin.deposits.index"),class:"btn btn-primary"},{default:v(()=>[zs,As]),_:1},8,["href"])])])]),s("div",Bs,[s("div",Fs,[s("div",Cs,[s("div",Hs,[Ls,t(f).length?(o(),a("div",Ws,[s("div",Es,[s("table",Ms,[$s,s("tbody",null,[(o(!0),a(h,null,p(t(f),(c,l)=>(o(),a("tr",{key:l},[s("td",null,e(`${c.first_name}`),1),s("td",null,e(c.last_name),1),s("td",null,e(c.email),1)]))),128))])])])])):(o(),a("div",qs,Is))]),s("div",Js,[s("span",Ks," + "+e(isNaN(t(u))?"0":t(u)-6)+" more users",1)]),i(b,{href:m.route("admin.users.index"),class:"btn btn-primary"},{default:v(()=>[Ps,Qs]),_:1},8,["href"])])])])])],64)}}};export{st as default};