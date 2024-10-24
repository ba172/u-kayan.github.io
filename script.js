// حساب عدد الأيام المتبقية
const today = new Date();
const endOfMaintenance = new Date(today);
endOfMaintenance.setDate(today.getDate() + 7); // نهاية الصيانة بعد 7 أيام

const daysRemaining = Math.ceil((endOfMaintenance - today) / (1000 * 60 * 60 * 24));
document.getElementById('days').textContent = daysRemaining;
