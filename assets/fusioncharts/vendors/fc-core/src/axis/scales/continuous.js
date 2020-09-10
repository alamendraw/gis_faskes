import interpolateValue from'../utils/interpolators/value';import interpolateRound from'../utils/interpolators/round';import constant from'../utils/constant';import enUS from'../../../../fc-utils/src/number-converter/locales/en-US';import{NumberConverter}from'../../../../fc-utils/src/number-converter';let count=0;const UNIT=[0,1];function bimap(a,b,c,d){var e,f;return a[0]>a[1]?(e=c(a[1],a[0]),f=d(b[1],b[0])):(e=c(a[0],a[1]),f=d(b[0],b[1])),a=>f(e(a))}function copyScale(a,b){return b.setInterpolate(a.getInterpolate()).setClamp(a.getClamp()).setDomain(a.getDomain()).setRange(a.getRange())}function deInterpolateLinear(a,b){a=+a,b=+b;let c=b-a;return c?b=>(b-a)/c:constant(c)}function deInterpolateClamp(a){return(b,c)=>{b=+b,c=+c;var d=a(b,c);return a=>a<=b?0:a>=c?1:d(a)}}function reInterpolateClamp(a){return(b,c)=>{b=+b,c=+c;var d=a(b,c);return a=>0>=a?b:1<=a?c:d(a)}}class ScaleContinuous{constructor(a,b){this.domain=UNIT,this.range=UNIT,this.deInterpolate=a,this.reInterpolate=b,this.interpolate=interpolateValue,this.clamp=!1,this.input=null,this.output=null,this.locale=enUS,this._localeConverter=new NumberConverter(enUS),this._rescale(),this._id='scale_'+count++}_rescale(){return this.input=null,this.output=null,this}setDomain(a=UNIT){return this.domain=a.map(Number),this._rescale()}getDomain(){return this.domain.slice()}setRange(a=UNIT){return this.range=a.slice(),this._rescale()}getRange(){return this.range.slice()}setInterpolate(a=interpolateValue){return this.interpolate=a,this._rescale()}getInterpolate(){return this.interpolate}setClamp(a=!1){return this.clamp=!!a,this._rescale()}getClamp(){return this.clamp}rangeRound(a=UNIT){return this.range=a.slice(),this.interpolate=interpolateRound,this._rescale()}getRangeValue(a){a=null===a?void 0:a;let b=this.getClamp(),c=b?deInterpolateClamp(this.deInterpolate):this.deInterpolate;return this.output||(this.output=bimap(this.getDomain(),this.getRange(),c,this.interpolate)),this.output(+a)}getDomainValue(a){let b=this.getClamp(),c=b?reInterpolateClamp(this.reInterpolate):this.reInterpolate;return this.input||(this.input=bimap(this.getRange(),this.getDomain(),deInterpolateLinear,c)),this.input(+a)}setLocale(a=enUS){return this.locale=a,this._localeConverter=new NumberConverter(a),this}getLocale(){return this.locale}getId(){return this._id}}export{copyScale,deInterpolateLinear,bimap};export default ScaleContinuous;