import Tool from'../tool';import{getDep}from'../../../dependency-manager';import{priorityList}from'../../../schedular';import{crispBound}from'../../../../../fc-core/src/lib';let R=getDep('redraphael','plugin'),mathMax=Math.max;class ScrollTrack extends Tool{constructor(){super(),this._evtHandlers={}}configureAttributes(a={}){let b=this.config;b.style={track:Object.assign({},{fill:a.displayFlat&&a.color||[90*a.isHorizontal,R.tintshade(a.color,.15).rgba,a.color].join('-'),stroke:R.tintshade(a.color,-.75).rgba},a.style.track)}}attachEventHandlers(){let a,b,c,d,e,f,g,h=this,i=h.config,j=h.getLinkedParent(),k=j.config,l=k.isHorizontal,m=function(){1<k.scrollPosition?(k.scrollPosition=1,d=!1):(0>k.scrollPosition||isNaN(k.scrollPosition))&&(k.scrollPosition=0,d=!1),f.asyncDraw(),'function'==typeof k.evt.scroll&&k.evt.scroll(k.scrollPosition)},n=function(){k.scrollPosition+=.01,e>=k.scrollPosition&&d&&(m(),h.addJob('dragScrollAnchorRight',n,priorityList.draw))},o=function(){k.scrollPosition-=.01,e<=k.scrollPosition&&d&&(m(),h.addJob('dragScrollAnchorLeft',o,priorityList.draw))};h.addEventListener('fc-mousedown',h._evtHandlers.mousedown||(h._evtHandlers.mousedown=function(m){f=j.getChildren('scrollAnchor')[0],g=f.config,a=m.originalEvent.layerX,b=m.originalEvent.layerY,d=!0,c=l?a-(g._nodeDimensions.x+i.transLateX+g._nodeDimensions.width/2):b-(g._nodeDimensions.y+i.transLateY+g._nodeDimensions.height/2),e=c/g.trackLength+k.scrollPosition,e>=k.scrollPosition?h.addJob('dragScrollAnchorRight',n,priorityList.draw):h.addJob('dragScrollAnchorLeft',o,priorityList.draw)})),h.addEventListener('fc-mouseup',h._evtHandlers.mouseup||(h._evtHandlers.mouseup=function(){d=!1}))}draw(){let a=this,b=a.config,c=this.getLinkedParent(),d=c.config,e=crispBound(d.x+.5,d.y+d.padding+.5,d.width-1,d.height-1,d.strokeWidth);a.addGraphicalElement({el:'rect',attr:{x:e.x,y:e.y,width:mathMax(e.width,0),height:mathMax(e.height,0),r:d.roundEdges&&2||0,opacity:b.style.track.opacity},css:b.style.track,container:{id:'scrollbarGroup',label:'scrollbarGroup',isParent:!0},component:a,label:'scrollbarTrack',id:'scrollbarTrack'})}}export default ScrollTrack;