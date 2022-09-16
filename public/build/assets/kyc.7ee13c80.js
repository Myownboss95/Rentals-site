import{b as j}from"./breadcrumb.263af8c3.js";import{_ as T}from"./paginator.a08364ef.js";import{c as g,x as k,i as w,r as U,a as c,b as i,d as l,e,u as n,F as h,g as x,n as C,w as f,E as $,t as d,O as Y,h as S}from"./main.378c769e.js";import{_ as z}from"./modal.8a41cf60.js";import{_ as r}from"./FormGroup.fa07a8b9.js";import{_ as D}from"./FormButton.bbf32f76.js";import{_ as B}from"./ButtonLoader.5f792d9e.js";import"./error.b1e7507b.js";import"./FormInput.16768d11.js";const H={class:"card shadow-lg radius-20 col-lg-10 mx-auto"},O={class:"card-body"},P={class:"table-responsive"},q={class:"table"},L=e("thead",null,[e("tr",null,[e("th"),e("th",null,"User"),e("th",null,"Email"),e("th",null,"Phone number"),e("th",null,"Country"),e("th",null,"State"),e("th",null,"City"),e("th",null,"Date"),e("th",null,"Actions")])],-1),R={key:0},Z=["src"],G=["onClick"],I=e("i",{class:"fa fa-eye"},null,-1),J=[I],Q={key:1},W=e("tr",null,[e("td",{colspan:"10",class:"text-muted text-center"}," No verifiable user found ")],-1),X=[W],ee={key:0,class:"d-flex justify-content-center"},te={class:"modal-body"},le={class:"text-center"},oe=["src"],se={class:"row mt-3"},ae={class:"row"},ne={class:"row"},ce={class:"row"},ie={class:"d-block w-100 py-1"},de={class:"d-block w-100 py-1"},re=["href"],me=e("i",{class:"fa fa-eye"},null,-1),ue=S(" view"),_e=[me,ue],pe={class:"d-flex justify-content-between mt-3"},$e={name:"kyc",props:{users:Object},setup(A){const b=A,m=g(()=>b.users.data),F=g(()=>b.users.links),o=k({}),u=k(!1),_=w({}),p=w({}),N=a=>{o.value=m.value.filter(s=>s.id==a)[0],u.value=!0},E=a=>{_.post(route("admin.kyc.approve",a),{onBefore:()=>confirm("Are you sure you want to approve this user?"),onSuccess:()=>y()})},V=a=>{p.post(route("admin.kyc.decline",a),{onBefore:()=>confirm("Are you sure you want to decline this user?"),onSuccess:()=>y()})},y=()=>{document.querySelectorAll(".btn-close").forEach(a=>{a.click()})},K=a=>{let s="Document";return a.type=="passport"?s+=" (Data page)":a.front?s+=" (Front)":s+=" (Back)",s};return(a,s)=>{const M=U("Head");return c(),i(h,null,[l(M,{title:"KYC"}),l(j,{title:"KYC",crumbs:["Dashboard","Users","KYC"]}),e("div",H,[e("div",O,[e("div",P,[e("table",q,[L,n(m).length?(c(),i("tbody",R,[(c(!0),i(h,null,x(n(m),(t,v)=>(c(),i("tr",{key:v},[e("td",null,[e("img",{src:n($)(t.image),style:{width:"30px",height:"30px","border-radius":"50%"}},null,8,Z)]),e("td",null,d(`${t==null?void 0:t.first_name} ${t==null?void 0:t.last_name}`),1),e("td",null,d(t==null?void 0:t.phone),1),e("td",null,d(t==null?void 0:t.email),1),e("td",null,d(t==null?void 0:t.country),1),e("td",null,d(t==null?void 0:t.state),1),e("td",null,d(t==null?void 0:t.city),1),e("td",null,d(new Date(t==null?void 0:t.created_at).toDateString()),1),e("td",null,[e("span",{onClick:ve=>N(t==null?void 0:t.id),class:"btn btn-outline-primary btn-sm"},J,8,G)])]))),128))])):(c(),i("tbody",Q,X))])]),n(m).length?(c(),i("div",ee,[l(T,{links:n(F)},null,8,["links"])])):C("",!0)])]),l(z,{title:"Kyc Verification",open:u.value,onModalClosed:s[2]||(s[2]=t=>u.value=!1)},{default:f(()=>[e("div",te,[e("div",null,[e("div",le,[o.value.image?(c(),i("img",{key:0,src:n($)(o.value.image),style:{width:"80px",height:"80px","border-radius":"50%"}},null,8,oe)):C("",!0)]),e("div",se,[l(r,{class:"col-md-6",label:"Name","model-value":`${o.value.first_name} ${o.value.last_name}`},null,8,["model-value"]),l(r,{class:"col-md-6",label:"Email","model-value":o.value.email},null,8,["model-value"])]),e("div",ae,[l(r,{class:"col-md-6",label:"Phone","model-value":o.value.phone},null,8,["model-value"]),l(r,{class:"col-md-6",label:"Country","model-value":o.value.country},null,8,["model-value"])]),e("div",ne,[l(r,{class:"col-md-6",label:"State/Region","model-value":o.value.state},null,8,["model-value"]),l(r,{class:"col-md-6",label:"City/Town","model-value":o.value.state},null,8,["model-value"])]),e("div",ce,[l(r,{class:"col-md-9",label:"Address","model-value":o.value.address},null,8,["model-value"]),l(r,{class:"col-md-3",label:"Zip code","model-value":o.value.zip_code},null,8,["model-value"])]),(c(!0),i(h,null,x(o.value.documents,(t,v)=>(c(),i("div",{key:v},[e("strong",ie,"Document type: "+d(n(Y)(t.type)),1),e("strong",de,[S(d(K(t))+": ",1),e("a",{target:"blank",class:"btn btn-outline-primary btn-sm mx-3",href:`/storage/documents/${t.document}`},_e,8,re)])]))),128)),e("div",pe,[l(D,{class:"btn btn-outline-danger",disabled:n(p).processing,onButtonClicked:s[0]||(s[0]=t=>V(o.value.id))},{default:f(()=>[l(B,{text:"<i class='fa fa-times'></i> Decline",loading:n(p).processing},null,8,["loading"])]),_:1},8,["disabled"]),l(D,{class:"btn btn-outline-success",disabled:n(_).processing,onButtonClicked:s[1]||(s[1]=t=>E(o.value.id))},{default:f(()=>[l(B,{text:"Approve <i class='fa fa-check'></i>",loading:n(_).processing},null,8,["loading"])]),_:1},8,["disabled"])])])])]),_:1},8,["open"])],64)}}};export{$e as default};