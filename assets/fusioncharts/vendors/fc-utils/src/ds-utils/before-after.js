import{getDateOffset}from'../time-intervals/datetime-ops';import{Weekdays}from'../datetime-enums';function before(a,b,c,d){if(!a)throw new Error('duration is missing');if(b&&(isNaN(b)||isNaN(+new Date(b))))throw new Error('timestamp is incorrect');return getDateOffset(isNaN(b)?+new Date:b,a.Unit,-a.number,c,d||Weekdays.Sunday)}function after(a,b,c,d){if(!a)throw new Error('duration is missing');if(b&&(isNaN(b)||isNaN(+new Date(b))))throw new Error('timestamp is incorrect');return getDateOffset(isNaN(b)?+new Date:b,a.Unit,a.number,c,d||Weekdays.Sunday)}export{before,after};