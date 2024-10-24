// حساب عدد الأيام
const today = new Date();
const startOfWeek = new Date(today);
startOfWeek.setDate(today.getDate() - today.getDay()); // بداية الأسبوع (الأحد)
const endOfWeek = new Date(startOfWeek);
endOfWeek.setDate(startOfWeek.getDate() + 7); // نهاية الأسبوع

const daysRemaining = Math.ceil((endOfWeek - today) / (1000 * 60 * 60 * 24));
document.getElementById('days').textContent = daysRemaining;
