import{b as p}from"./breadcrumb.8f552bf8.js";import{_ as u}from"./FormButton.8e5ba5c0.js";import{_ as h}from"./ButtonLoader.fcac1798.js";import{r as f,a,b as n,d as o,e as t,F as c,g as b,h as s,t as r,w as g,l as v}from"./main.1d6adac6.js";const B={class:"container"},k={class:"plans row"},x={class:"card mb-xl-0 shadow-lg radius-20"},y={class:"card-body"},C={class:"p-2"},T={class:"font-size-16"},w=t("i",{class:"fas fa-robot"},null,-1),z={class:"mt-4 pt-2 text-muted"},L={class:"mb-3 font-size-12"},N=s(" Can generate "),V=s(" Trades a day. "),$={class:"mb-3 font-size-12"},D=s(" Can manage profit percentage up to "),F=s(" per trade. "),H={class:"mt-4 pt-2"},G={name:"link",props:["bots"],setup(d){const _=i=>{v.Inertia.post(route("user.bots.store",{bot_id:i}))};return(i,E)=>{const l=f("Head");return a(),n(c,null,[o(l,{title:"Trade Bots"}),o(p,{title:"Trade Bots",crumbs:["Dashboard","Trading","Trade Bots","Link"]}),t("div",B,[t("div",k,[(a(!0),n(c,null,b(d.bots,(e,m)=>(a(),n("div",{class:"col-xl-3 col-sm-6 mb-3",key:m},[t("div",x,[t("div",y,[t("div",C,[t("h5",T,[w,s(" "+r(e.name),1)]),t("div",z,[t("p",L,[N,t("strong",null,r(e.trades_per_day),1),V]),t("p",$,[D,t("strong",null,r(e.profit_percentage)+"%",1),F])]),t("div",H,[o(u,{class:"btn btn-outline-primary w-100",onButtonClicked:I=>_(e.id)},{default:g(()=>[o(h,{text:"Link Bot"})]),_:2},1032,["onButtonClicked"])])])])])]))),128))])])],64)}}};export{G as default};
