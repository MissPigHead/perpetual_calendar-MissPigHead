# 萬年曆 RWD  
-> 繳交calendar_final.php為作品  
-> calendar_orign.php的功能較多，但版面太多資訊，顯亂，保留檔案以後參考功能寫法 
  
## --《 calendar_final.php 》--  
 - 相較原始版本： 減少重複資訊，避免版面過於繁複
 - 待調整：時間下方格言tab顯示外觀
###  > 查詢功能
 - 指定月份  
 - 前一個月 
 - 後一個月 
###  > 顯示功能
 - 查詢當日：黃字，淺底色 
 - 特定節日：粉紅外框，底下小字顯示節日名稱 
 - 滑鼠移動至特定節日：字體放大，加半透明底色，凸顯節日名稱 
 - 週六：綠字，字體加粗 
 - 週日：紅字，字體加粗 
 - 當下時間
 - 每月各有主題圖片，1個月3張，每次隨機顯示其中1張
   - (裝置寬度小於992px時 此功能不顯示)
 - 隨機格言：50組名人與格言，隨機顯示 
   - (~~將資料庫改以php陣列方式處理~~ 將資料庫 motto.sql檔案置於DB資料夾中) 
 - ~~今天日期：已在月曆表格顯示，避免重複資訊，已刪除~~
 - ~~今天星期幾：已在月曆表格顯示，避免重複資訊，已刪除~~
 - ~~時區：目前無法選擇，無顯示必要，已刪除~~
  
  
## --《 calendar_origin.php 》--  
 - bug  (2020/11/11 已修復)
   1. 年份限制輸入正整數，依照炎炎老師建議顯示default值做為引導
   2. Mother's Day 出現跳脫符號，已移除  
   3. 修正Today條件，加入年份限制
###  > 查詢功能
 - 指定月份  
 - 前一個月
   - (裝置寬度小於768px時 此功能不顯示)  
 - 後一個月  
   - (裝置寬度小於768px時 此功能不顯示)  
###  > 顯示功能
 - 今天日期、星期幾、時間、時區
   - (裝置寬度小於768px時 此功能不顯示)
 - 每月2張當月主題圖片，隨機顯示 
   - (裝置寬度小於992px時 此功能不顯示)
 - 週末紅字
 - 滑鼠移動到日曆時，背景變化；空格、表頭不變化
 - 特定節日：粉紅底色
 - 查詢當日：黃色底色
  
#  

