<style>


    /* CSS Document */

    html, body, div, span, applet, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, a, abbr, acronym, address, big, cite, code, del, dfn, em, font, img, ins, kbd, q, s, samp, small, strike, strong, sub, sup, tt, var,
    dl, dt, dd, ol, ul, li, fieldset, form, input, label, legend, table, caption, tbody, tfoot, thead, tr, th, td {
        margin: 0;
        padding: 0;
    }

    h1, h2, h3, h4, h5, h6, fieldset, form, div, ul, ol, li, dl, dt, dd, p {
        margin: 0;
        padding: 0;
    }

    ul, ol, li {
        list-style: none;
    }

    /* Alink */
    a {
        color: #666;
        text-decoration: none
    }

    a:hover {
        text-decoration: none
    }

    /* Basic */
    img {
        border: 0
    }

    /* Space */
    hr {
        clear: both;
        display: block;
        visibility: hidden;
        width: 1px;
        height: 30px !important;
        font-size: 0;
        line-height: 0
    }

    /*Content*/
    .content1 {
        display: flex;
        justify-content: center;
        position: relative;
        width: auto;
        height: 100%;

    }

    /*지역선택 - map*/

    /* 전국 */
    .map_country {
        position: absolute;
        width: 262px;
        height: 284px;
        z-index: 10;
        top: 49px;
        left: 62px;
        text-align: center;
    }

    .map_country li {
        position: absolute;
        height: 2px;
        font-size: 11px;
        letter-spacing: -1px;
        color: #333;
    }

    .map_country li a {
        color: #333;
    }

    .map_country li a:hover {
        color: #333;
        font-size: 11px;
        text-decoration: none;
        font-weight: bold
    }

    .map_country li a.on {
        color: #333;
        font-size: 11px;
        text-decoration: none;
        font-weight: bold
    }

    /* 전국 */
    .tx1_1 {
        left: 67px;
        top: 42px;
    }

    /* 서울특별시 */
    .tx1_2 {
        left: 60px;
        top: 63px;
    }

    /* 경기도 */
    .tx1_3 {
        left: 103px;
        top: 41px;
    }

    /* 강원도*/
    .tx1_4 {
        left: 98px;
        top: 156px;
    }

    /* 경상남도 */
    .tx1_5 {
        left: 115px;
        top: 101px;
    }

    /* 경상북도 */
    .tx1_6 {
        left: 43px;
        top: 167px;
    }

    /* 광주광역시 */
    .tx1_7 {
        left: 127px;
        top: 128px;
    }

    /* 대구광역시 */
    .tx1_8 {
        left: 66px;
        top: 110px;
    }

    /* 대전 */
    .tx1_9 {
        left: 147px;
        top: 168px;
    }

    /* 부산광역시 */
    .tx1_10 {
        left: 60px;
        top: 93px;
    }

    /* 세종 */
    .tx1_11 {
        left: 157px;
        top: 144px;
    }

    /* 울산 */
    .tx1_12 {
        left: 12px;
        top: 49px;
    }

    /* 인천광역시 */
    .tx1_13 {
        left: 38px;
        top: 186px;
    }

    /* 전라남도 */
    .tx1_14 {
        left: 53px;
        top: 135px;
    }

    /* 전라북도 */
    .tx1_15 {
        left: 45px;
        top: 226px;
    }

    /* 제주특별시 */
    .tx1_16 {
        left: 19px;
        top: 89px;
    }

    /* 충청남도 */
    .tx1_17 {
        left: 82px;
        top: 78px;
    }

    /* 충청북도 */
    .tx1_18 {
        left: 172px;
        top: 34px;
    }

    /* 울릉도 */
    .tx1_19 {
        left: 192px;
        top: 71px;
    }

    /*독도  */

    .map_infotx {
        position: absolute;
        width: 355px;
        height: 13px;
        z-index: 12;
        bottom: 8px;
        left: 270px;
    }

    /* 전국시도 */

    .mappedcity {
        position: absolute;
        width: auto;
        height: 115px;
        font-size:1vw;
        z-index: 11;
        text-align: center;
    }

    .mappedcity li {
        position: absolute;
        font-size: 1vw;
        letter-spacing: -1px;
        font-weight: normal;
        color: #575757;
        width: 48px;
        height: 15px;

    }

    .mappedcity li a {
        color: #575757;
    }

    .mappedcity li a:hover {
        color: #1857a6;
        font-size: 12px;
        text-decoration: none;
        font-weight: bold;
    }

    .mappedcity li a.on {
        color: #1857a6;
        font-size: 12px;
        text-decoration: none;
        font-weight: bold;
    }

    /* 서울특별시 */
    .tx2_1_1 {
        left: 227px;
        top: 206px;
    }

    /* 강남구 */
    .tx2_1_2 {
        left: 304px;
        top: 158px;
    }

    /* 강동구 */
    .tx2_1_3 {
        left: 180px;
        top: 78px;
    }

    /* 강북구 */
    .tx2_1_4 {
        left: 31px;
        top: 147px;
    }

    /* 강서구*/
    .tx2_1_5 {
        left: 137px;
        top: 235px;
    }

    /* 관악구 */
    .tx2_1_6 {
        left: 249px;
        top: 160px;
    }

    /* 광진구 */
    .tx2_1_7 {
        left: 61px;
        top: 207px;
    }

    /* 구로구 */
    .tx2_1_8 {
        left: 93px;
        top: 238px;
    }

    /* 금천구 */
    .tx2_1_9 {
        left: 233px;
        top: 72px;
    }

    /* 노원구 */
    .tx2_1_10 {
        left: 201px;
        top: 48px;
    }

    /* 도봉구 */
    .tx2_1_11 {
        left: 217px;
        top: 131px;
    }

    /* 동대문구 */
    .tx2_1_12 {
        left: 132px;
        top: 198px;
    }

    /* 동작구 */
    .tx2_1_13 {
        left: 102px;
        top: 152px;
    }

    /* 마포구 */
    .tx2_1_14 {
        left: 124px;
        top: 133px;
    }

    /* 서대문구 */
    .tx2_1_15 {
        left: 190px;
        top: 226px;
    }

    /* 서초구 */
    .tx2_1_16 {
        left: 208px;
        top: 156px;
    }

    /* 성동구 */
    .tx2_1_17 {
        left: 192px;
        top: 111px;
    }

    /* 성북구 */
    .tx2_1_18 {
        left: 274px;
        top: 192px;
    }

    /* 송파구 */
    .tx2_1_19 {
        left: 49px;
        top: 181px;
    }

    /* 양천구 */
    .tx2_1_20 {
        left: 96px;
        top: 183px;
    }

    /* 영등포구 */
    .tx2_1_21 {
        left: 161px;
        top: 171px;
    }

    /* 용산구 */
    .tx2_1_22 {
        left: 116px;
        top: 98px;
    }

    /* 은평구 */
    .tx2_1_23 {
        left: 150px;
        top: 116px;
    }

    /* 종로구 */
    .tx2_1_24 {
        left: 171px;
        top: 150px;
    }

    /* 중구 */
    .tx2_1_25 {
        left: 249px;
        top: 110px;
    }

    /* 중랑구 */

    /* 경기도 */
    .tx2_2_1 {
        left: 209px;
        top: 94px;
    }

    /* 가평 */
    .tx2_2_2 {
        left: 107px;
        top: 131px;
    }

    /* 고양 */
    .tx2_2_3 {
        left: 136px;
        top: 173px;
    }

    /* 과천 */
    .tx2_2_4 {
        left: 113px;
        top: 169px;
    }

    /* 광명*/
    .tx2_2_5 {
        left: 184px;
        top: 186px;
    }

    /* 광주광역시 */
    .tx2_2_6 {
        left: 153px;
        top: 142px;
    }

    /* 구리 */
    .tx2_2_7 {
        left: 119px;
        top: 200px;
    }

    /* 군포 */
    .tx2_2_8 {
        left: 65px;
        top: 129px;
    }

    /* 김포 */
    .tx2_2_9 {
        left: 177px;
        top: 129px;
    }

    /* 남양주 */
    .tx2_2_10 {
        left: 148px;
        top: 76px;
    }

    /* 동두천 */
    .tx2_2_11 {
        left: 91px;
        top: 163px;
    }

    /* 부천 */
    .tx2_2_12 {
        left: 155px;
        top: 185px;
    }

    /* 성남 */
    .tx2_2_13 {
        left: 133px;
        top: 216px;
    }

    /* 수원 */
    .tx2_2_14 {
        left: 90px;
        top: 187px;
    }

    /* 시흥 */
    .tx2_2_15 {
        left: 94px;
        top: 208px;
    }

    /* 안산 */
    .tx2_2_16 {
        left: 185px;
        top: 267px;
    }

    /* 안성 */
    .tx2_2_17 {
        left: 119px;
        top: 185px;
    }

    /* 안양 */
    .tx2_2_18 {
        left: 140px;
        top: 96px;
    }

    /* 양주 */
    .tx2_2_19 {
        left: 232px;
        top: 163px;
    }

    /* 양평 */
    .tx2_2_20 {
        left: 246px;
        top: 212px;
    }

    /* 여주 */
    .tx2_2_21 {
        left: 141px;
        top: 38px;
    }

    /* 연천 */
    .tx2_2_22 {
        left: 141px;
        top: 240px;
    }

    /* 오산 */
    .tx2_2_23 {
        left: 176px;
        top: 232px;
    }

    /* 용인 */
    .tx2_2_24 {
        left: 139px;
        top: 196px;
    }

    /* 의왕 */
    .tx2_2_25 {
        left: 148px;
        top: 117px;
    }

    /* 의정부 */
    .tx2_2_26 {
        left: 211px;
        top: 227px;
    }

    /* 이천 */
    .tx2_2_27 {
        left: 104px;
        top: 93px;
    }

    /* 파주 */
    .tx2_2_28 {
        left: 132px;
        top: 273px;
    }

    /* 평택 */
    .tx2_2_29 {
        left: 183px;
        top: 55px;
    }

    /* 포천 */
    .tx2_2_30 {
        left: 167px;
        top: 162px;
    }

    /* 하남 */
    .tx2_2_31 {
        left: 111px;
        top: 233px;
    }

    /* 화성 */

    /* 강원도 */
    .tx2_3_1 {
        left: 247px;
        top: 164px;
    }

    /* 강릉 */
    .tx2_3_2 {
        left: 181px;
        top: 55px;
    }

    /* 고성 */
    .tx2_3_3 {
        left: 280px;
        top: 197px;
    }

    /* 동해 */
    .tx2_3_4 {
        left: 281px;
        top: 231px;
    }

    /* 삼척*/
    .tx2_3_5 {
        left: 209px;
        top: 100px;
    }

    /* 속초 */
    .tx2_3_6 {
        left: 125px;
        top: 77px;
    }

    /* 양구 */
    .tx2_3_7 {
        left: 211px;
        top: 123px;
    }

    /* 양양 */
    .tx2_3_8 {
        left: 188px;
        top: 249px;
    }

    /* 영월 */
    .tx2_3_9 {
        left: 109px;
        top: 228px;
    }

    /* 원주 */
    .tx2_3_10 {
        left: 163px;
        top: 107px;
    }

    /* 인제 */
    .tx2_3_11 {
        left: 223px;
        top: 221px;
    }

    /* 정선 */
    .tx2_3_12 {
        left: 39px;
        top: 72px;
    }

    /* 철원 */
    .tx2_3_13 {
        left: 92px;
        top: 130px;
    }

    /* 춘천 */
    .tx2_3_14 {
        left: 261px;
        top: 259px;
    }

    /* 태백 */
    .tx2_3_15 {
        left: 187px;
        top: 185px;
    }

    /* 평창 */
    .tx2_3_16 {
        left: 132px;
        top: 156px;
    }

    /* 홍천 */
    .tx2_3_17 {
        left: 83px;
        top: 90px;
    }

    /* 화천 */
    .tx2_3_18 {
        left: 135px;
        top: 191px;
    }

    /* 횡성 */

    /* 경상남도 */
    .tx2_4_1 {
        left: 204px;
        top: 251px;
    }

    /* 거제 */
    .tx2_4_2 {
        left: 63px;
        top: 46px;
    }

    /* 거창 */
    .tx2_4_3 {
        left: 134px;
        top: 218px;
    }

    /* 고성 */
    .tx2_4_4 {
        left: 243px;
        top: 157px;
    }

    /* 김해 */
    .tx2_4_5 {
        left: 74px;
        top: 266px;
    }

    /* 남해 */
    .tx2_4_6 {
        left: 231px;
        top: 107px;
    }

    /* 밀양 */
    .tx2_4_7 {
        left: 93px;
        top: 206px;
    }

    /* 사천 */
    .tx2_4_8 {
        left: 63px;
        top: 137px;
    }

    /* 산청 */
    .tx2_4_9 {
        left: 279px;
        top: 126px;
    }

    /* 양산 */
    .tx2_4_10 {
        left: 134px;
        top: 131px;
    }

    /* 의령 */
    .tx2_4_11 {
        left: 110px;
        top: 175px;
    }

    /* 진주 */
    .tx2_4_12 {
        left: 173px;
        top: 96px;
    }

    /* 창녕 */
    .tx2_4_13 {
        left: 194px;
        top: 174px;
    }

    /* 창원 */
    .tx2_4_14 {
        left: 155px;
        top: 249px;
    }

    /* 통영 */
    .tx2_4_15 {
        left: 43px;
        top: 186px;
    }

    /* 하동 */
    .tx2_4_16 {
        left: 165px;
        top: 152px;
    }

    /* 함안 */
    .tx2_4_17 {
        left: 30px;
        top: 90px;
    }

    /* 함양 */
    .tx2_4_18 {
        left: 109px;
        top: 91px;
    }

    /* 합천 */

    /* 경상북도 */
    .tx2_5_1 {
        left: 150px;
        top: 243px;
    }

    /* 경산*/
    .tx2_5_2 {
        left: 206px;
        top: 245px;
    }

    /* 경주 */
    .tx2_5_3 {
        left: 76px;
        top: 260px;
    }

    /* 고령 */
    .tx2_5_4 {
        left: 85px;
        top: 185px;
    }

    /* 구미 */
    .tx2_5_5 {
        left: 129px;
        top: 193px;
    }

    /* 군위 */
    .tx2_5_6 {
        left: 45px;
        top: 208px;
    }

    /* 김천 */
    .tx2_5_7 {
        left: 61px;
        top: 100px;
    }

    /* 문경 */
    .tx2_5_8 {
        left: 157px;
        top: 66px;
    }

    /* 봉화 */
    .tx2_5_9 {
        left: 46px;
        top: 148px;
    }

    /* 상주 */
    .tx2_5_10 {
        left: 67px;
        top: 231px;
    }

    /* 성주 */
    .tx2_5_11 {
        left: 140px;
        top: 122px;
    }

    /* 안동 */
    .tx2_5_12 {
        left: 217px;
        top: 136px;
    }

    /* 영덕 */
    .tx2_5_13 {
        left: 192px;
        top: 104px;
    }

    /* 영양 */
    .tx2_5_14 {
        left: 111px;
        top: 78px;
    }

    /* 영주 */
    .tx2_5_15 {
        left: 166px;
        top: 211px;
    }

    /* 영천 */
    .tx2_5_16 {
        left: 90px;
        top: 115px;
    }

    /* 예천 */
    .tx2_5_17 {
        left: 300px;
        top: 39px;
    }

    /* 울릉 */
    .tx2_5_18 {
        left: 209px;
        top: 62px;
    }

    /* 울진 */
    .tx2_5_19 {
        left: 121px;
        top: 157px;
    }

    /* 의성 */
    .tx2_5_20 {
        left: 144px;
        top: 269px;
    }

    /* 청도 */
    .tx2_5_21 {
        left: 186px;
        top: 158px;
    }

    /* 청송 */
    .tx2_5_22 {
        left: 101px;
        top: 214px;
    }

    /* 칠곡 */
    .tx2_5_23 {
        left: 208px;
        top: 189px;
    }

    /* 포항 */
    .tx2_5_24 {
        left: 326px;
        top: 75px;
    }

    /* 독도 */

    /* 광주광역시 */
    .tx2_6_1 {
        left: 88px;
        top: 139px;
    }

    /* 광산 */
    .tx2_6_2 {
        left: 185px;
        top: 218px;
    }

    /* 남구 */
    .tx2_6_3 {
        left: 267px;
        top: 200px;
    }

    /* 동구 */
    .tx2_6_4 {
        left: 230px;
        top: 111px;
    }

    /* 북구 */
    .tx2_6_5 {
        left: 181px;
        top: 171px;
    }

    /* 서구 */

    /* 대구광역시 */
    .tx2_7_1 {
        left: 188px;
        top: 131px;
    }

    /* 남구 */
    .tx2_7_2 {
        left: 153px;
        top: 137px;
    }

    /* 달서 */
    .tx2_7_3 {
        left: 140px;
        top: 193px;
    }

    /* 달성 */
    .tx2_7_4 {
        left: 248px;
        top: 62px;
    }

    /* 동구 */
    .tx2_7_5 {
        left: 184px;
        top: 62px;
    }

    /* 북구 */
    .tx2_7_6 {
        left: 168px;
        top: 99px;
    }

    /* 서구 */
    .tx2_7_7 {
        left: 232px;
        top: 131px;
    }

    /* 수성 */
    .tx2_7_8 {
        left: 193px;
        top: 109px;
    }

    /* 중구 */

    /* 대전 */
    .tx2_8_1 {
        left: 202px;
        top: 70px;
    }

    /* 대덕 */
    .tx2_8_2 {
        left: 220px;
        top: 163px;
    }

    /* 동구 */
    .tx2_8_3 {
        left: 113px;
        top: 224px;
    }

    /* 서구 */
    .tx2_8_4 {
        left: 113px;
        top: 112px;
    }

    /* 유성 */
    .tx2_8_5 {
        left: 171px;
        top: 206px;
    }

    /* 중구 */

    /* 부산광역시 */
    .tx2_9_1 {
        left: 78px;
        top: 194px;
    }

    /* 강서 */
    .tx2_9_2 {
        left: 187px;
        top: 96px;
    }

    /* 금정 */
    .tx2_9_3 {
        left: 250px;
        top: 65px;
    }

    /* 기장 */
    .tx2_9_4 {
        left: 196px;
        top: 189px;
    }

    /* 남구 */
    .tx2_9_5 {
        left: 168px;
        top: 186px;
    }

    /* 동구 */
    .tx2_9_6 {
        left: 182px;
        top: 130px;
    }

    /* 동래 */
    .tx2_9_7 {
        left: 165px;
        top: 161px;
    }

    /* 부산광역시진 */
    .tx2_9_8 {
        left: 154px;
        top: 117px;
    }

    /* 북구 */
    .tx2_9_9 {
        left: 133px;
        top: 173px;
    }

    /* 사상*/
    .tx2_9_10 {
        left: 131px;
        top: 217px;
    }

    /* 사하 */
    .tx2_9_11 {
        left: 147px;
        top: 191px;
    }

    /* 서구*/
    .tx2_9_12 {
        left: 207px;
        top: 161px;
    }

    /* 수영*/
    .tx2_9_13 {
        left: 189px;
        top: 147px;
    }

    /* 연제 */
    .tx2_9_14 {
        left: 182px;
        top: 226px;
    }

    /* 영도 */
    .tx2_9_15 {
        left: 161px;
        top: 206px;
    }

    /* 중구 */
    .tx2_9_16 {
        left: 227px;
        top: 139px;
    }

    /* 해운대 */

    /* 세종 */
    .tx2_10_1 {
        left: 165px;
        top: 161px;
    }

    /* 울산 */
    .tx2_11_1 {
        left: 225px;
        top: 155px;
    }

    /* 남구 */
    .tx2_11_2 {
        left: 273px;
        top: 159px;
    }

    /* 동구 */
    .tx2_11_3 {
        left: 260px;
        top: 88px;
    }

    /* 북구 */
    .tx2_11_4 {
        left: 115px;
        top: 133px;
    }

    /* 울주 */
    .tx2_11_5 {
        left: 208px;
        top: 114px;
    }

    /* 중구 */

    /* 인천광역시 */
    .tx2_12_1 {
        left: 173px;
        top: 85px;
    }

    /* 강화 */
    .tx2_12_2 {
        left: 306px;
        top: 172px;
    }

    /* 계양 */
    .tx2_12_3 {
        left: 273px;
        top: 232px;
    }

    /* 남구 */
    .tx2_12_4 {
        left: 303px;
        top: 245px;
    }

    /* 남동 */
    .tx2_12_5 {
        left: 258px;
        top: 214px;
    }

    /* 동구 */
    .tx2_12_6 {
        left: 296px;
        top: 206px;
    }

    /* 부평 */
    .tx2_12_7 {
        left: 260px;
        top: 160px;
    }

    /* 서구 */
    .tx2_12_8 {
        left: 271px;
        top: 255px;
    }

    /* 연수 */
    .tx2_12_9 {
        left: 155px;
        top: 272px;
    }

    /* 옹진 */
    .tx2_12_10 {
        left: 248px;
        top: 228px;
    }

    /* 중구 */

    /* 전라남도 */
    .tx2_13_1 {
        left: 153px;
        top: 205px;
    }

    /* 강진*/
    .tx2_13_2 {
        left: 253px;
        top: 211px;
    }

    /* 고흥 */
    .tx2_13_3 {
        left: 240px;
        top: 74px;
    }

    /* 곡성 */
    .tx2_13_4 {
        left: 312px;
        top: 117px;
    }

    /* 광양 */
    .tx2_13_5 {
        left: 284px;
        top: 73px;
    }

    /* 구례 */
    .tx2_13_6 {
        left: 141px;
        top: 125px;
    }

    /* 나주 */
    .tx2_13_7 {
        left: 189px;
        top: 60px;
    }

    /* 담양 */
    .tx2_13_8 {
        left: 74px;
        top: 166px;
    }

    /* 목포*/
    .tx2_13_9 {
        left: 89px;
        top: 134px;
    }

    /* 무안*/
    .tx2_13_10 {
        left: 227px;
        top: 163px;
    }

    /* 보성 */
    .tx2_13_11 {
        left: 260px;
        top: 124px;
    }

    /* 순천 */
    .tx2_13_12 {
        left: 25px;
        top: 169px;
    }

    /* 신안 */
    .tx2_13_13 {
        left: 312px;
        top: 171px;
    }

    /* 여수*/
    .tx2_13_14 {
        left: 95px;
        top: 65px;
    }

    /* 영광*/
    .tx2_13_15 {
        left: 130px;
        top: 165px;
    }

    /* 영암*/
    .tx2_13_16 {
        left: 152px;
        top: 267px;
    }

    /* 완도*/
    .tx2_13_17 {
        left: 149px;
        top: 55px;
    }

    /* 장성 */
    .tx2_13_18 {
        left: 181px;
        top: 187px;
    }

    /* 장흥 */
    .tx2_13_19 {
        left: 57px;
        top: 242px;
    }

    /* 진도 */
    .tx2_13_20 {
        left: 112px;
        top: 98px;
    }

    /* 함평 */
    .tx2_13_21 {
        left: 113px;
        top: 225px;
    }

    /* 해남 */
    .tx2_13_22 {
        left: 198px;
        top: 122px;
    }

    /* 화순 */

    /* 전라북도 */
    .tx2_14_1 {
        left: 28px;
        top: 235px;
    }

    /* 고창 */
    .tx2_14_2 {
        left: 62px;
        top: 79px;
    }

    /* 군산 */
    .tx2_14_3 {
        left: 96px;
        top: 121px;
    }

    /* 김제 */
    .tx2_14_4 {
        left: 226px;
        top: 237px;
    }

    /* 남원*/
    .tx2_14_5 {
        left: 291px;
        top: 82px;
    }

    /* 무주 */
    .tx2_14_6 {
        left: 38px;
        top: 162px;
    }

    /* 부안 */
    .tx2_14_7 {
        left: 138px;
        top: 233px;
    }

    /* 순창*/
    .tx2_14_8 {
        left: 175px;
        top: 77px;
    }

    /* 완주*/
    .tx2_14_9 {
        left: 121px;
        top: 60px;
    }

    /* 익산 */
    .tx2_14_10 {
        left: 175px;
        top: 190px;
    }

    /* 임실 */
    .tx2_14_11 {
        left: 249px;
        top: 165px;
    }

    /* 장수 */
    .tx2_14_12 {
        left: 142px;
        top: 116px;
    }

    /* 전주 */
    .tx2_14_13 {
        left: 97px;
        top: 184px;
    }

    /* 정읍 */
    .tx2_14_14 {
        left: 221px;
        top: 118px;
    }

    /* 진안 */

    /* 제주특별시 */
    .tx2_15_1 {
        left: 199px;
        top: 168px;
    }

    /* 서귀포 */
    .tx2_15_2 {
        left: 150px;
        top: 110px;
    }

    /* 제주특별시 */

    /* 충청남도 */
    .tx2_16_1 {
        left: 250px;
        top: 200px;
    }

    /* 계룡 */
    .tx2_16_2 {
        left: 213px;
        top: 155px;
    }

    /* 공주 */
    .tx2_16_3 {
        left: 291px;
        top: 244px;
    }

    /* 금산 */
    .tx2_16_4 {
        left: 224px;
        top: 225px;
    }

    /* 논산 */
    .tx2_16_5 {
        left: 115px;
        top: 56px;
    }

    /* 당진 */
    .tx2_16_6 {
        left: 110px;
        top: 195px;
    }

    /* 보령 */
    .tx2_16_7 {
        left: 165px;
        top: 217px;
    }

    /* 부여 */
    .tx2_16_8 {
        left: 75px;
        top: 89px;
    }

    /* 서산*/
    .tx2_16_9 {
        left: 132px;
        top: 253px;
    }

    /* 서천*/
    .tx2_16_10 {
        left: 180px;
        top: 77px;
    }

    /* 아산 */
    .tx2_16_11 {
        left: 146px;
        top: 104px;
    }

    /* 예산*/
    .tx2_16_12 {
        left: 232px;
        top: 76px;
    }

    /* 천안 */
    .tx2_16_13 {
        left: 156px;
        top: 169px;
    }

    /* 청양 */
    .tx2_16_14 {
        left: 23px;
        top: 87px;
    }

    /* 태안*/
    .tx2_16_15 {
        left: 110px;
        top: 136px;
    }

    /* 홍성 */

    /* 충청북도 */
    .tx2_17_1 {
        left: 136px;
        top: 118px;
    }

    /* 괴산 */
    .tx2_17_2 {
        left: 261px;
        top: 64px;
    }

    /* 단양 */
    .tx2_17_3 {
        left: 114px;
        top: 181px;
    }

    /* 보은 */
    .tx2_17_4 {
        left: 141px;
        top: 257px;
    }

    /* 영동*/
    .tx2_17_5 {
        left: 100px;
        top: 222px;
    }

    /* 옥천 */
    .tx2_17_6 {
        left: 78px;
        top: 80px;
    }

    /* 음성 */
    .tx2_17_7 {
        left: 208px;
        top: 54px;
    }

    /* 제천 */
    .tx2_17_8 {
        left: 83px;
        top: 122px;
    }

    /* 증평 */
    .tx2_17_9 {
        left: 47px;
        top: 101px;
    }

    /* 진천 */

    .tx2_17_10 {
        left: 57px;
        top: 153px;
    }

    /* 청주 */
    .tx2_17_11 {
        left: 140px;
        top: 63px;
    }

    /* 충주 */


</style>
<div class="content1" >
    <div class="mappedcity" style="display:block;" id="1">
        <img src="/map/Seoul.png" alt="서울특별시"/>
        <ul>
            <li class="tx2_1_1"><a href="javascript:dev_district('서울특별시','강남구');" class="" alt="서울특별시 강남구"
                                   title="서울특별시 강남구">강남구</a></li>
            <li class="tx2_1_2"><a href="javascript:dev_district('서울특별시','강동구');" class="" alt="서울특별시 강동구"
                                   title="서울특별시 강동구">강동구</a></li>
            <li class="tx2_1_3"><a href="javascript:dev_district('서울특별시','강북구');" class="" alt="서울특별시 강북구"
                                   title="서울특별시 강북구">강북구</a></li>
            <li class="tx2_1_4"><a href="javascript:dev_district('서울특별시','강서구');" class="" alt="서울특별시 강서구"
                                   title="서울특별시 강서구">강서구</a></li>
            <li class="tx2_1_5"><a href="javascript:dev_district('서울특별시','관악구');" class="" alt="서울특별시 관악구"
                                   title="서울특별시 관악구">관악구</a></li>
            <li class="tx2_1_6"><a href="javascript:dev_district('서울특별시','광진구');" class="" alt="서울특별시 광진구"
                                   title="서울특별시 광진구">광진구</a></li>
            <li class="tx2_1_7"><a href="javascript:dev_district('서울특별시','구로구');" class="" alt="서울특별시 구로구"
                                   title="서울특별시 구로구">구로구</a></li>
            <li class="tx2_1_8"><a href="javascript:dev_district('서울특별시','금천구');" class="" alt="서울특별시 금천구"
                                   title="서울특별시 금천구">금천구</a></li>
            <li class="tx2_1_9"><a href="javascript:dev_district('서울특별시','노원구');" class="" alt="서울특별시 노원구"
                                   title="서울특별시 노원구">노원구</a></li>
            <li class="tx2_1_10"><a href="javascript:dev_district('서울특별시','도봉구');" class="" alt="서울특별시 도봉구"
                                    title="서울특별시 도봉구">도봉구</a></li>
            <li class="tx2_1_11"><a href="javascript:dev_district('서울특별시','동대문구');" class="" alt="서울특별시 동대문구"
                                    title="서울특별시 동대문구">동대문구</a></li>
            <li class="tx2_1_12"><a href="javascript:dev_district('서울특별시','동작구');" class="" alt="서울특별시 동작구"
                                    title="서울특별시 동작구">동작구</a></li>
            <li class="tx2_1_13"><a href="javascript:dev_district('서울특별시','마포구');" class="" alt="서울특별시 마포구"
                                    title="서울특별시 마포구">마포구</a></li>
            <li class="tx2_1_14"><a href="javascript:dev_district('서울특별시','서대문구');" class="" alt="서울특별시 서대문구"
                                    title="서울특별시 서대문구">서대문구</a></li>
            <li class="tx2_1_15"><a href="javascript:dev_district('서울특별시','서초구');" class="" alt="서울특별시 서초구"
                                    title="서울특별시 서초구">서초구</a></li>
            <li class="tx2_1_16"><a href="javascript:dev_district('서울특별시','성동구');" class="" alt="서울특별시 성동구"
                                    title="서울특별시 성동구">성동구</a></li>
            <li class="tx2_1_17"><a href="javascript:dev_district('서울특별시','성북구');" class="" alt="서울특별시 성북구"
                                    title="서울특별시 성북구">성북구</a></li>
            <li class="tx2_1_18"><a href="javascript:dev_district('서울특별시','송파구');" class="" alt="서울특별시 송파구"
                                    title="서울특별시 송파구">송파구</a></li>
            <li class="tx2_1_19"><a href="javascript:dev_district('서울특별시','양천구');" class="" alt="서울특별시 양천구"
                                    title="서울특별시 양천구">양천구</a></li>
            <li class="tx2_1_20"><a href="javascript:dev_district('서울특별시','영등포구');" class="" alt="서울특별시 영등포구"
                                    title="서울특별시 영등포구">영등포구</a></li>
            <li class="tx2_1_21"><a href="javascript:dev_district('서울특별시','용산구');" class="" alt="서울특별시 용산구"
                                    title="서울특별시 용산구">용산구</a></li>
            <li class="tx2_1_22"><a href="javascript:dev_district('서울특별시','은평구');" class="" alt="서울특별시 은평구"
                                    title="서울특별시 은평구">은평구</a></li>
            <li class="tx2_1_23"><a href="javascript:dev_district('서울특별시','종로구');" class="" alt="서울특별시 종로구"
                                    title="서울특별시 종로구">종로구</a></li>
            <li class="tx2_1_24"><a href="javascript:dev_district('서울특별시','중구');" class="" alt="서울특별시 중구"
                                    title="서울특별시 중구">중구</a></li>
            <li class="tx2_1_25"><a href="javascript:dev_district('서울특별시','중랑구');" class="" alt="서울특별시 중랑구"
                                    title="서울특별시 중랑구">중랑구</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display:none;" id="3">
        <img src="/map/Gangreung.png" alt="강원도"/>
        <ul>
            <li class="tx2_3_1"><a href="javascript:dev_district('강원도','강릉시');" alt="강원도 강릉시"
                                   title="강원도 강릉시">강릉시</a></li>
            <li class="tx2_3_2"><a href="javascript:dev_district('강원도','고성군');" alt="강원도 고성군"
                                   title="강원도 고성군">고성군</a></li>
            <li class="tx2_3_3"><a href="javascript:dev_district('강원도','동해시');" alt="강원도 동해시"
                                   title="강원도 동해시">동해시</a></li>
            <li class="tx2_3_4"><a href="javascript:dev_district('강원도','삼척시');" alt="강원도 삼척시"
                                   title="강원도 삼척시">삼척시</a></li>
            <li class="tx2_3_5"><a href="javascript:dev_district('강원도','속초시');" alt="강원도 속초시"
                                   title="강원도 속초시">속초시</a></li>
            <li class="tx2_3_6"><a href="javascript:dev_district('강원도','양구군');" alt="강원도 양구군"
                                   title="강원도 양구군">양구군</a></li>
            <li class="tx2_3_7"><a href="javascript:dev_district('강원도','양양군');" alt="강원도 양양군"
                                   title="강원도 양양군">양양군</a></li>
            <li class="tx2_3_8"><a href="javascript:dev_district('강원도','영월군');" alt="강원도 영월군"
                                   title="강원도 영월군">영월군</a></li>
            <li class="tx2_3_9"><a href="javascript:dev_district('강원도','원주시');" alt="강원도 원주시"
                                   title="강원도 원주시">원주시</a></li>
            <li class="tx2_3_10"><a href="javascript:dev_district('강원도','인제군');" alt="강원도 인제군"
                                    title="강원도 인제군">인제군</a></li>
            <li class="tx2_3_11"><a href="javascript:dev_district('강원도','정선군');" alt="강원도 정선군"
                                    title="강원도 정선군">정선군</a></li>
            <li class="tx2_3_12"><a href="javascript:dev_district('강원도','철원군');" alt="강원도 철원군"
                                    title="강원도 철원군">철원군</a></li>
            <li class="tx2_3_13"><a href="javascript:dev_district('강원도','춘천시');" alt="강원도 춘천시"
                                    title="강원도 춘천시">춘천시</a></li>
            <li class="tx2_3_14"><a href="javascript:dev_district('강원도','태백시');" alt="강원도 태백시"
                                    title="강원도 태백시">태백시</a></li>
            <li class="tx2_3_15"><a href="javascript:dev_district('강원도','평창군');" alt="강원도 평창군"
                                    title="강원도 평창군">평창군</a></li>
            <li class="tx2_3_16"><a href="javascript:dev_district('강원도','홍천군');" alt="강원도 홍천군"
                                    title="강원도 홍천군">홍천군</a></li>
            <li class="tx2_3_17"><a href="javascript:dev_district('강원도','화천군');" alt="강원도 화천군"
                                    title="강원도 화천군">화천군</a></li>
            <li class="tx2_3_18"><a href="javascript:dev_district('강원도','횡성군');" alt="강원도 횡성군"
                                    title="강원도 횡성군">횡성군</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display:none;" id="12">
        <img src="/map/Incheon.png" alt="인천광역시"/>
        <ul>
            <li class="tx2_12_1"><a href="javascript:dev_district('인천광역시','강화군');" alt="인천광역시 강화군"
                                    title="인천광역시 강화군">강화군</a></li>
            <li class="tx2_12_2"><a href="javascript:dev_district('인천광역시','계양구');" alt="인천광역시 계양구"
                                    title="인천광역시 계양구">계양구</a></li>
            <li class="tx2_12_3"><a href="javascript:dev_district('인천광역시','남구');" alt="인천광역시 남구" title="인천광역시 남구">남구</a>
            </li>
            <li class="tx2_12_4"><a href="javascript:dev_district('인천광역시','남동구');" alt="인천광역시 남동구"
                                    title="인천광역시 남동구">남동구</a></li>
            <li class="tx2_12_5"><a href="javascript:dev_district('인천광역시','동구');" alt="인천광역시 동구" title="인천광역시 동구">동구</a>
            </li>
            <li class="tx2_12_6"><a href="javascript:dev_district('인천광역시','부평구');" alt="인천광역시 부평구"
                                    title="인천광역시 부평구">부평구</a></li>
            <li class="tx2_12_7"><a href="javascript:dev_district('인천광역시','서구');" alt="인천광역시 서구" title="인천광역시 서구">서구</a>
            </li>
            <li class="tx2_12_8"><a href="javascript:dev_district('인천광역시','연수구');" alt="인천광역시 연수구"
                                    title="인천광역시 연수구">연수구</a></li>
            <li class="tx2_12_9"><a href="javascript:dev_district('인천광역시','옹진군');" alt="인천광역시 옹진군"
                                    title="인천광역시 옹진군">옹진군</a></li>
            <li class="tx2_12_10"><a href="javascript:dev_district('인천광역시','중구');" alt="인천광역시 중구" title="인천광역시 중구">중구</a>
            </li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="2">
        <img src="/map/GyeongGi.png" alt="경기도">
        <ul>
            <li class="tx2_2_1"><a href="javascript:dev_district('경기도','가평군');" alt="경기도 가평" title="경기도 가평">가평</a>
            </li>
            <li class="tx2_2_2"><a href="javascript:dev_district('경기도','고양');" alt="경기도 고양" title="경기도 고양">고양</a>
            </li>
            <li class="tx2_2_3"><a href="javascript:dev_district('경기도','과천');" alt="경기도 과천" title="경기도 과천">과천</a>
            </li>
            <li class="tx2_2_4"><a href="javascript:dev_district('경기도','광명');" alt="경기도 광명" title="경기도 광명">광명</a>
            </li>
            <li class="tx2_2_5"><a href="javascript:dev_district('경기도','광주');" alt="경기도 광주광역시" title="경기도 광주광역시">광주광역시</a>
            </li>
            <li class="tx2_2_6"><a href="javascript:dev_district('경기도','구리');" alt="경기도 구리" title="경기도 구리">구리</a>
            </li>
            <li class="tx2_2_7"><a href="javascript:dev_district('경기도','군포');" alt="경기도 군포" title="경기도 군포">군포</a>
            </li>
            <li class="tx2_2_8"><a href="javascript:dev_district('경기도','김포');" alt="경기도 김포" title="경기도 김포">김포</a>
            </li>
            <li class="tx2_2_9"><a href="javascript:dev_district('경기도','남양주');" alt="경기도 남양주"
                                   title="경기도 남양주">남양주</a></li>
            <li class="tx2_2_10"><a href="javascript:dev_district('경기도','동두천');" alt="경기도 동두천"
                                    title="경기도 동두천">동두천</a></li>
            <li class="tx2_2_11"><a href="javascript:dev_district('경기도','부천');" alt="경기도 부천" title="경기도 부천">부천</a>
            </li>
            <li class="tx2_2_12"><a href="javascript:dev_district('경기도','성남');" alt="경기도 성남" title="경기도 성남">성남</a>
            </li>
            <li class="tx2_2_13"><a href="javascript:dev_district('경기도','수원');" alt="경기도 수원" title="경기도 수원">수원</a>
            </li>
            <li class="tx2_2_14"><a href="javascript:dev_district('경기도','시흥');" alt="경기도 시흥" title="경기도 시흥">시흥</a>
            </li>
            <li class="tx2_2_15"><a href="javascript:dev_district('경기도','안산');" alt="경기도 안산" title="경기도 안산">안산</a>
            </li>
            <li class="tx2_2_16"><a href="javascript:dev_district('경기도','안성');" alt="경기도 안성" title="경기도 안성">안성</a>
            </li>
            <li class="tx2_2_17"><a href="javascript:dev_district('경기도','안양');" alt="경기도 안양" title="경기도 안양">안양</a>
            </li>
            <li class="tx2_2_18"><a href="javascript:dev_district('경기도','양주');" alt="경기도 양주" title="경기도 양주">양주</a>
            </li>
            <li class="tx2_2_19"><a href="javascript:dev_district('경기도','양평');" alt="경기도 양평" title="경기도 양평">양평</a>
            </li>
            <li class="tx2_2_20"><a href="javascript:dev_district('경기도','여주');" alt="경기도 여주" title="경기도 여주">여주</a>
            </li>
            <li class="tx2_2_21"><a href="javascript:dev_district('경기도','연천');" alt="경기도 연천" title="경기도 연천">연천</a>
            </li>
            <li class="tx2_2_22"><a href="javascript:dev_district('경기도','오산');" alt="경기도 오산" title="경기도 오산">오산</a>
            </li>
            <li class="tx2_2_23"><a href="javascript:dev_district('경기도','용인');" alt="경기도 용인" title="경기도 용인">용인</a>
            </li>
            <li class="tx2_2_24"><a href="javascript:dev_district('경기도','의왕');" alt="경기도 의왕" title="경기도 의왕">의왕</a>
            </li>
            <li class="tx2_2_25"><a href="javascript:dev_district('경기도','의정부');" alt="경기도 의정부"
                                    title="경기도 의정부">의정부</a></li>
            <li class="tx2_2_26"><a href="javascript:dev_district('경기도','이천');" alt="경기도 이천" title="경기도 이천">이천</a>
            </li>
            <li class="tx2_2_27"><a href="javascript:dev_district('경기도','파주');" alt="경기도 파주" title="경기도 파주">파주</a>
            </li>
            <li class="tx2_2_28"><a href="javascript:dev_district('경기도','평택');" alt="경기도 평택" title="경기도 평택">평택</a>
            </li>
            <li class="tx2_2_29"><a href="javascript:dev_district('경기도','포천');" alt="경기도 포천" title="경기도 포천">포천</a>
            </li>
            <li class="tx2_2_30"><a href="javascript:dev_district('경기도','하남');" alt="경기도 하남" title="경기도 하남">하남</a>
            </li>
            <li class="tx2_2_31"><a href="javascript:dev_district('경기도','화성');" alt="경기도 화성" title="경기도 화성">화성</a>
            </li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="17">
        <img src="/map/ChoongBuk.png" alt="충청북도">
        <ul>
            <li class="tx2_17_1"><a href="javascript:dev_district('충청북도','괴산군');" alt="충청북도 괴산군"
                                    title="충청북도 괴산군">괴산군</a></li>
            <li class="tx2_17_2"><a href="javascript:dev_district('충청북도','단양군');" alt="충청북도 단양군"
                                    title="충청북도 단양군">단양군</a></li>
            <li class="tx2_17_3"><a href="javascript:dev_district('충청북도','보은군');" alt="충청북도 보은군"
                                    title="충청북도 보은군">보은군</a></li>
            <li class="tx2_17_4"><a href="javascript:dev_district('충청북도','영동군');" alt="충청북도 영동군"
                                    title="충청북도 영동군">영동군</a></li>
            <li class="tx2_17_5"><a href="javascript:dev_district('충청북도','옥천군');" alt="충청북도 옥천군"
                                    title="충청북도 옥천군">옥천군</a></li>
            <li class="tx2_17_6"><a href="javascript:dev_district('충청북도','음성군');" alt="충청북도 음성군"
                                    title="충청북도 음성군">음성군</a></li>
            <li class="tx2_17_7"><a href="javascript:dev_district('충청북도','제천시');" alt="충청북도 제천시"
                                    title="충청북도 제천시">제천시</a></li>
            <li class="tx2_17_8"><a href="javascript:dev_district('충청북도','증평군');" alt="충청북도 증평군"
                                    title="충청북도 증평군">증평군</a></li>
            <li class="tx2_17_9"><a href="javascript:dev_district('충청북도','진천군');" alt="충청북도 진천군"
                                    title="충청북도 진천군">진천군</a></li>
            <li class="tx2_17_10"><a href="javascript:dev_district('충청북도','청주시');" alt="충청북도 청주시"
                                     title="충청북도 청주시">청주시</a></li>
            <li class="tx2_17_11"><a href="javascript:dev_district('충청북도','충주시');" alt="충청북도 충주시"
                                     title="충청북도 충주시">충주시</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="16">
        <img src="/map/ChoongNam.png" alt="충청남도">
        <ul>
            <li class="tx2_16_1"><a href="javascript:dev_district('충청남도','계룡시');" alt="충청남도 계룡시"
                                    title="충청남도 계룡시">계룡시</a></li>
            <li class="tx2_16_2"><a href="javascript:dev_district('충청남도','공주시');" alt="충청남도 공주시"
                                    title="충청남도 공주시">공주시</a></li>
            <li class="tx2_16_3"><a href="javascript:dev_district('충청남도','금산군');" alt="충청남도 금산군"
                                    title="충청남도 금산군">금산군</a></li>
            <li class="tx2_16_4"><a href="javascript:dev_district('충청남도','논산시');" alt="충청남도 논산시"
                                    title="충청남도 논산시">논산시</a></li>
            <li class="tx2_16_5"><a href="javascript:dev_district('충청남도','당진시');" alt="충청남도 당진시"
                                    title="충청남도 당진시">당진시</a></li>
            <li class="tx2_16_6"><a href="javascript:dev_district('충청남도','보령시');" alt="충청남도 보령시"
                                    title="충청남도 보령시">보령시</a></li>
            <li class="tx2_16_7"><a href="javascript:dev_district('충청남도','부여군');" alt="충청남도 부여군"
                                    title="충청남도 부여군">부여군</a></li>
            <li class="tx2_16_8"><a href="javascript:dev_district('충청남도','서산시');" alt="충청남도 서산시"
                                    title="충청남도 서산시">서산시</a></li>
            <li class="tx2_16_9"><a href="javascript:dev_district('충청남도','서천군');" alt="충청남도 서천군"
                                    title="충청남도 서천군">서천군</a></li>
            <li class="tx2_16_10"><a href="javascript:dev_district('충청남도','아산시');" alt="충청남도 아산시"
                                     title="충청남도 아산시">아산시</a></li>
            <li class="tx2_16_11"><a href="javascript:dev_district('충청남도','예산군');" alt="충청남도 예산군"
                                     title="충청남도 예산군">예산군</a></li>
            <li class="tx2_16_12"><a href="javascript:dev_district('충청남도','천안시');" alt="충청남도 천안시"
                                     title="충청남도 천안시">천안시</a></li>
            <li class="tx2_16_13"><a href="javascript:dev_district('충청남도','청양군');" alt="충청남도 청양군"
                                     title="충청남도 청양군">청양군</a></li>
            <li class="tx2_16_14"><a href="javascript:dev_district('충청남도','태안군');" alt="충청남도 태안군"
                                     title="충청남도 태안군">태안군</a></li>
            <li class="tx2_16_15"><a href="javascript:dev_district('충청남도','홍성군');" alt="충청남도 홍성군"
                                     title="충청남도 홍성군">홍성군</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="10">
        <img src="/map/Sejong.png" alt="세종">
        <ul>
            <li class="tx2_10_1"><a href="javascript:dev_district('세종특별자치시','세종시');" alt="세종 세종특별자치시"
                                    title="세종특별자치시 세종시">세종시</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="8">
        <img src="/map/Daejeon.png" alt="대전">
        <ul>
            <li class="tx2_8_1"><a href="javascript:dev_district('대전광역시','대덕구');" alt="대전 대덕구"
                                   title="대전 대덕구">대덕구</a></li>
            <li class="tx2_8_2"><a href="javascript:dev_district('대전광역시','동구');" alt="대전 동구" title="대전 동구">동구</a>
            </li>
            <li class="tx2_8_3"><a href="javascript:dev_district('대전광역시','서구');" alt="대전 서구" title="대전 서구">서구</a>
            </li>
            <li class="tx2_8_4"><a href="javascript:dev_district('대전광역시','유성구');" alt="대전 유성구"
                                   title="대전 유성구">유성구</a></li>
            <li class="tx2_8_5"><a href="javascript:dev_district('대전광역시','중구');" alt="대전 중구" title="대전 중구">중구</a>
            </li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="5">
        <img src="/map/GyeongBuk.png" alt="경상북도">
        <ul>
            <li class="tx2_5_1"><a href="javascript:dev_district('경상북도','경산시');" alt="경상북도 경산시"
                                   title="경상북도 경산시">경산시</a></li>
            <li class="tx2_5_2"><a href="javascript:dev_district('경상북도','경주시');" alt="경상북도 경주시"
                                   title="경상북도 경주시">경주시</a></li>
            <li class="tx2_5_3"><a href="javascript:dev_district('경상북도','고령군');" alt="경상북도 고령군"
                                   title="경상북도 고령군">고령군</a></li>
            <li class="tx2_5_4"><a href="javascript:dev_district('경상북도','구미시');" alt="경상북도 구미시"
                                   title="경상북도 구미시">구미시</a></li>
            <li class="tx2_5_5"><a href="javascript:dev_district('경상북도','군위군');" alt="경상북도 군위군"
                                   title="경상북도 군위군">군위군</a></li>
            <li class="tx2_5_6"><a href="javascript:dev_district('경상북도','김천시');" alt="경상북도 김천시"
                                   title="경상북도 김천시">김천시</a></li>
            <li class="tx2_5_7"><a href="javascript:dev_district('경상북도','문경시');" alt="경상북도 문경시"
                                   title="경상북도 문경시">문경시</a></li>
            <li class="tx2_5_8"><a href="javascript:dev_district('경상북도','봉화군');" alt="경상북도 봉화군"
                                   title="경상북도 봉화군">봉화군</a></li>
            <li class="tx2_5_9"><a href="javascript:dev_district('경상북도','상주시');" alt="경상북도 상주시"
                                   title="경상북도 상주시">상주시</a></li>
            <li class="tx2_5_10"><a href="javascript:dev_district('경상북도','성주군');" alt="경상북도 성주군"
                                    title="경상북도 성주군">성주군</a></li>
            <li class="tx2_5_11"><a href="javascript:dev_district('경상북도','안동시');" alt="경상북도 안동시"
                                    title="경상북도 안동시">안동시</a></li>
            <li class="tx2_5_12"><a href="javascript:dev_district('경상북도','영덕군');" alt="경상북도 영덕군"
                                    title="경상북도 영덕군">영덕군</a></li>
            <li class="tx2_5_13"><a href="javascript:dev_district('경상북도','영양군');" alt="경상북도 영양군"
                                    title="경상북도 영양군">영양군</a></li>
            <li class="tx2_5_14"><a href="javascript:dev_district('경상북도','영주시');" alt="경상북도 영주시"
                                    title="경상북도 영주시">영주시</a></li>
            <li class="tx2_5_15"><a href="javascript:dev_district('경상북도','영천시');" alt="경상북도 영천시"
                                    title="경상북도 영천시">영천시</a></li>
            <li class="tx2_5_16"><a href="javascript:dev_district('경상북도','예천군');" alt="경상북도 예천군"
                                    title="경상북도 예천군">예천군</a></li>
            <li class="tx2_5_17"><a href="javascript:dev_district('경상북도','울릉군');" alt="경상북도 울릉군"
                                    title="경상북도 울릉군">울릉군</a></li>
            <li class="tx2_5_18"><a href="javascript:dev_district('경상북도','울진군');" alt="경상북도 울진군"
                                    title="경상북도 울진군">울진군</a></li>
            <li class="tx2_5_19"><a href="javascript:dev_district('경상북도','의성군');" alt="경상북도 의성군"
                                    title="경상북도 의성군">의성군</a></li>
            <li class="tx2_5_20"><a href="javascript:dev_district('경상북도','청도군');" alt="경상북도 청도군"
                                    title="경상북도 청도군">청도군</a></li>
            <li class="tx2_5_21"><a href="javascript:dev_district('경상북도','청송군');" alt="경상북도 청송군"
                                    title="경상북도 청송군">청송군</a></li>
            <li class="tx2_5_22"><a href="javascript:dev_district('경상북도','칠곡군');" alt="경상북도 칠곡군"
                                    title="경상북도 칠곡군">칠곡군</a></li>
            <li class="tx2_5_23"><a href="javascript:dev_district('경상북도','포항시');" alt="경상북도 포항시"
                                    title="경상북도 포항시">포항시</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="14">
        <img src="/map/Jeonbuk.png" alt="전라북도">
        <ul>
            <li class="tx2_14_1"><a href="javascript:dev_district('전라북도','고창군');" alt="전라북도 고창군"
                                    title="전라북도 고창군">고창군</a></li>
            <li class="tx2_14_2"><a href="javascript:dev_district('전라북도','군산시');" alt="전라북도 군산시"
                                    title="전라북도 군산시">군산시</a></li>
            <li class="tx2_14_3"><a href="javascript:dev_district('전라북도','김제시');" alt="전라북도 김제시"
                                    title="전라북도 김제시">김제시</a></li>
            <li class="tx2_14_4"><a href="javascript:dev_district('전라북도','남원시');" alt="전라북도 남원시"
                                    title="전라북도 남원시">남원시</a></li>
            <li class="tx2_14_5"><a href="javascript:dev_district('전라북도','무주군');" alt="전라북도 무주군"
                                    title="전라북도 무주군">무주군</a></li>
            <li class="tx2_14_6"><a href="javascript:dev_district('전라북도','부안군');" alt="전라북도 부안군"
                                    title="전라북도 부안군">부안군</a></li>
            <li class="tx2_14_7"><a href="javascript:dev_district('전라북도','순창군');" alt="전라북도 순창군"
                                    title="전라북도 순창군">순창군</a></li>
            <li class="tx2_14_8"><a href="javascript:dev_district('전라북도','완주군');" alt="전라북도 완주군"
                                    title="전라북도 완주군">완주군</a></li>
            <li class="tx2_14_9"><a href="javascript:dev_district('전라북도','익산시');" alt="전라북도 익산시"
                                    title="전라북도 익산시">익산시</a></li>
            <li class="tx2_14_10"><a href="javascript:dev_district('전라북도','임실군');" alt="전라북도 임실군"
                                     title="전라북도 임실군">임실군</a></li>
            <li class="tx2_14_11"><a href="javascript:dev_district('전라북도','장수군');" alt="전라북도 장수군"
                                     title="전라북도 장수군">장수군</a></li>
            <li class="tx2_14_12"><a href="javascript:dev_district('전라북도','전주시');" alt="전라북도 전주시"
                                     title="전라북도 전주시">전주시</a></li>
            <li class="tx2_14_13"><a href="javascript:dev_district('전라북도','정읍시');" alt="전라북도 정읍시"
                                     title="전라북도 정읍시">정읍시</a></li>
            <li class="tx2_14_14"><a href="javascript:dev_district('전라북도','진안군');" alt="전라북도 진안군"
                                     title="전라북도 진안군">진안군</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="7">
        <img src="/map/Daegu.png" alt="대구">
        <ul>
            <li class="tx2_7_1"><a href="javascript:dev_district('대구광역시','남구');" alt="대구광역시 남구" title="대구광역시 남구">남구</a>
            </li>
            <li class="tx2_7_2"><a href="javascript:dev_district('대구광역시','달서구');" alt="대구광역시 달서구"
                                   title="대구광역시 달서구">달서구</a></li>
            <li class="tx2_7_3"><a href="javascript:dev_district('대구광역시','달성군');" alt="대구광역시 달성군"
                                   title="대구광역시 달성군">달성군</a></li>
            <li class="tx2_7_4"><a href="javascript:dev_district('대구광역시','동구');" alt="대구광역시 동구" title="대구광역시 동구">동구</a>
            </li>
            <li class="tx2_7_5"><a href="javascript:dev_district('대구광역시','북구');" alt="대구광역시 북구" title="대구광역시 북구">북구</a>
            </li>
            <li class="tx2_7_6"><a href="javascript:dev_district('대구광역시','서구');" alt="대구광역시 서구" title="대구광역시 서구">서구</a>
            </li>
            <li class="tx2_7_7"><a href="javascript:dev_district('대구광역시','수성구');" alt="대구광역시 수성구"
                                   title="대구광역시 수성구">수성구</a></li>
            <li class="tx2_7_8"><a href="javascript:dev_district('대구광역시','중구');" alt="대구광역시 중구" title="대구광역시 중구">중구</a>
            </li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="11">
        <img src="/map/Ulsan.png" alt="울산">
        <ul>
            <li class="tx2_11_1"><a href="javascript:dev_district('울산광역시','남구');" alt="울산 남구" title="울산 남구">남구</a>
            </li>
            <li class="tx2_11_2"><a href="javascript:dev_district('울산광역시','동구');" alt="울산 동구" title="울산 동구">동구</a>
            </li>
            <li class="tx2_11_3"><a href="javascript:dev_district('울산광역시','북구');" alt="울산 북구" title="울산 북구">북구</a>
            </li>
            <li class="tx2_11_4"><a href="javascript:dev_district('울산광역시','울주군');" alt="울산 울주군"
                                    title="울산 울주군">울주군</a></li>
            <li class="tx2_11_5"><a href="javascript:dev_district('울산광역시','중구');" alt="울산 중구" title="울산 중구">중구</a>
            </li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="4">
        <img src="/map/GyeongNam.png" alt="경상남도">
        <ul>
            <li class="tx2_4_1"><a href="javascript:dev_district('경상남도','거제시');" alt="경상남도 거제시"
                                   title="경상남도 거제시">거제시</a></li>
            <li class="tx2_4_2"><a href="javascript:dev_district('경상남도','거창군');" alt="경상남도 거창군"
                                   title="경상남도 거창군">거창군</a></li>
            <li class="tx2_4_3"><a href="javascript:dev_district('경상남도','고성군');" alt="경상남도 고성군"
                                   title="경상남도 고성군">고성군</a></li>
            <li class="tx2_4_4"><a href="javascript:dev_district('경상남도','김해시');" alt="경상남도 김해시"
                                   title="경상남도 김해시">김해시</a></li>
            <li class="tx2_4_5"><a href="javascript:dev_district('경상남도','남해군');" alt="경상남도 남해군"
                                   title="경상남도 남해군">남해군</a></li>
            <li class="tx2_4_6"><a href="javascript:dev_district('경상남도','밀양시');" alt="경상남도 밀양시"
                                   title="경상남도 밀양시">밀양시</a></li>
            <li class="tx2_4_7"><a href="javascript:dev_district('경상남도','사천시');" alt="경상남도 사천시"
                                   title="경상남도 사천시">사천시</a></li>
            <li class="tx2_4_8"><a href="javascript:dev_district('경상남도','산청군');" alt="경상남도 산청군"
                                   title="경상남도 산청군">산청군</a></li>
            <li class="tx2_4_9"><a href="javascript:dev_district('경상남도','양산시');" alt="경상남도 양산시"
                                   title="경상남도 양산시">양산시</a></li>
            <li class="tx2_4_10"><a href="javascript:dev_district('경상남도','의령군');" alt="경상남도 의령군"
                                    title="경상남도 의령군">의령군</a></li>
            <li class="tx2_4_11"><a href="javascript:dev_district('경상남도','진주시');" alt="경상남도 진주시"
                                    title="경상남도 진주시">진주시</a></li>
            <li class="tx2_4_12"><a href="javascript:dev_district('경상남도','창녕군');" alt="경상남도 창녕군"
                                    title="경상남도 창녕군">창녕군</a></li>
            <li class="tx2_4_13"><a href="javascript:dev_district('경상남도','창원시');" alt="경상남도 창원시"
                                    title="경상남도 창원시">창원시</a></li>
            <li class="tx2_4_14"><a href="javascript:dev_district('경상남도','통영시');" alt="경상남도 통영시"
                                    title="경상남도 통영시">통영시</a></li>
            <li class="tx2_4_15"><a href="javascript:dev_district('경상남도','하동군');" alt="경상남도 하동군"
                                    title="경상남도 하동군">하동군</a></li>
            <li class="tx2_4_16"><a href="javascript:dev_district('경상남도','함안군');" alt="경상남도 함안군"
                                    title="경상남도 함안군">함안군</a></li>
            <li class="tx2_4_17"><a href="javascript:dev_district('경상남도','함양군');" alt="경상남도 함양군"
                                    title="경상남도 함양군">함양군</a></li>
            <li class="tx2_4_18"><a href="javascript:dev_district('경상남도','합천군');" alt="경상남도 합천군"
                                    title="경상남도 합천군">합천군</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="9">
        <img src="/map/Busan.png" alt="부산광역시">
        <ul>
            <li class="tx2_9_1"><a href="javascript:dev_district('부산광역시','강서구');" alt="부산광역시 강서구"
                                   title="부산광역시 강서구">강서구</a></li>
            <li class="tx2_9_2"><a href="javascript:dev_district('부산광역시','금정구');" alt="부산광역시 금정구"
                                   title="부산광역시 금정구">금정구</a></li>
            <li class="tx2_9_3"><a href="javascript:dev_district('부산광역시','기장군');" alt="부산광역시 기장군"
                                   title="부산광역시 기장군">기장군</a></li>
            <li class="tx2_9_4"><a href="javascript:dev_district('부산광역시','남구');" alt="부산광역시 남구" title="부산광역시 남구">남구</a>
            </li>
            <li class="tx2_9_5"><a href="javascript:dev_district('부산광역시','동구');" alt="부산광역시 동구" title="부산광역시 동구">동구</a>
            </li>
            <li class="tx2_9_6"><a href="javascript:dev_district('부산광역시','동래구');" alt="부산광역시 동래구"
                                   title="부산광역시 동래구">동래구</a></li>
            <li class="tx2_9_7"><a href="javascript:dev_district('부산광역시','부산진구');" alt="부산광역시 부산광역시진구"
                                   title="부산광역시 부산광역시진구">부산광역시진구</a>
            </li>
            <li class="tx2_9_8"><a href="javascript:dev_district('부산광역시','북구');" alt="부산광역시 북구" title="부산광역시 북구">북구</a>
            </li>
            <li class="tx2_9_9"><a href="javascript:dev_district('부산광역시','사상구');" alt="부산광역시 사상구"
                                   title="부산광역시 사상구">사상구</a></li>
            <li class="tx2_9_10"><a href="javascript:dev_district('부산광역시','사하구');" alt="부산광역시 사하구"
                                    title="부산광역시 사하구">사하구</a></li>
            <li class="tx2_9_11"><a href="javascript:dev_district('부산광역시','서구');" alt="부산광역시 서구" title="부산광역시 서구">서구</a>
            </li>
            <li class="tx2_9_12"><a href="javascript:dev_district('부산광역시','수영구');" alt="부산광역시 수영구"
                                    title="부산광역시 수영구">수영구</a></li>
            <li class="tx2_9_13"><a href="javascript:dev_district('부산광역시','연제구');" alt="부산광역시 연제구"
                                    title="부산광역시 연제구">연제구</a></li>
            <li class="tx2_9_14"><a href="javascript:dev_district('부산광역시','영도구');" alt="부산광역시 영도구"
                                    title="부산광역시 영도구">영도구</a></li>
            <li class="tx2_9_15"><a href="javascript:dev_district('부산광역시','중구');" alt="부산광역시 중구" title="부산광역시 중구">중구</a>
            </li>
            <li class="tx2_9_16"><a href="javascript:dev_district('부산광역시','해운대구');" alt="부산광역시 해운대구"
                                    title="부산광역시 해운대구">해운대구</a>
            </li>
        </ul>
    </div>
    <div class="mappedcity" style="display:none;" id="13">
        <img src="/map/JeonNam.png" alt="전라남도">
        <ul>
            <li class="tx2_13_1"><a href="javascript:dev_district('전라남도','강진군');" alt="전라남도 강진군"
                                    title="전라남도 강진군">강진군</a></li>
            <li class="tx2_13_2"><a href="javascript:dev_district('전라남도','고흥군');" alt="전라남도 고흥군"
                                    title="전라남도 고흥군">고흥군</a></li>
            <li class="tx2_13_3"><a href="javascript:dev_district('전라남도','곡성군');" alt="전라남도 곡성군"
                                    title="전라남도 곡성군">곡성군</a></li>
            <li class="tx2_13_4"><a href="javascript:dev_district('전라남도','광양시');" alt="전라남도 광양시"
                                    title="전라남도 광양시">광양시</a></li>
            <li class="tx2_13_5"><a href="javascript:dev_district('전라남도','구례군');" alt="전라남도 구례군"
                                    title="전라남도 구례군">구례군</a></li>
            <li class="tx2_13_6"><a href="javascript:dev_district('전라남도','나주시');" alt="전라남도 나주시"
                                    title="전라남도 나주시">나주시</a></li>
            <li class="tx2_13_7"><a href="javascript:dev_district('전라남도','담양군');" alt="전라남도 담양군"
                                    title="전라남도 담양군">담양군</a></li>
            <li class="tx2_13_8"><a href="javascript:dev_district('전라남도','목포시');" alt="전라남도 목포시"
                                    title="전라남도 목포시">목포시</a></li>
            <li class="tx2_13_9"><a href="javascript:dev_district('전라남도','무안군');" alt="전라남도 무안군"
                                    title="전라남도 무안군">무안군</a></li>
            <li class="tx2_13_10"><a href="javascript:dev_district('전라남도','보성군');" alt="전라남도 보성군"
                                     title="전라남도 보성군">보성군</a></li>
            <li class="tx2_13_11"><a href="javascript:dev_district('전라남도','순천시');" alt="전라남도 순천시"
                                     title="전라남도 순천시">순천시</a></li>
            <li class="tx2_13_12"><a href="javascript:dev_district('전라남도','신안군');" alt="전라남도 신안군"
                                     title="전라남도 신안군">신안군</a></li>
            <li class="tx2_13_13"><a href="javascript:dev_district('전라남도','여수시');" alt="전라남도 여수시"
                                     title="전라남도 여수시">여수시</a></li>
            <li class="tx2_13_14"><a href="javascript:dev_district('전라남도','영광군');" alt="전라남도 영광군"
                                     title="전라남도 영광군">영광군</a></li>
            <li class="tx2_13_15"><a href="javascript:dev_district('전라남도','영암군');" alt="전라남도 영암군"
                                     title="전라남도 영암군">영암군</a></li>
            <li class="tx2_13_16"><a href="javascript:dev_district('전라남도','완도군');" alt="전라남도 완도군"
                                     title="전라남도 완도군">완도군</a></li>
            <li class="tx2_13_17"><a href="javascript:dev_district('전라남도','장성군');" alt="전라남도 장성군"
                                     title="전라남도 장성군">장성군</a></li>
            <li class="tx2_13_18"><a href="javascript:dev_district('전라남도','장흥군');" alt="전라남도 장흥군"
                                     title="전라남도 장흥군">장흥군</a></li>
            <li class="tx2_13_19"><a href="javascript:dev_district('전라남도','진도군');" alt="전라남도 진도군"
                                     title="전라남도 진도군">진도군</a></li>
            <li class="tx2_13_20"><a href="javascript:dev_district('전라남도','함평군');" alt="전라남도 함평군"
                                     title="전라남도 함평군">함평군</a></li>
            <li class="tx2_13_21"><a href="javascript:dev_district('전라남도','해남군');" alt="전라남도 해남군"
                                     title="전라남도 해남군">해남군</a></li>
            <li class="tx2_13_22"><a href="javascript:dev_district('전라남도','화순군');" alt="전라남도 화순군"
                                     title="전라남도 화순군">화순군</a></li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;" id="6">
        <img src="/map/Gwangju.png" alt="광주광역시">
        <ul>
            <li class="tx2_6_1"><a href="javascript:dev_district('광주광역시','광산구');" alt="광주광역시 광산구"
                                   title="광주광역시 광산구">광산구</a></li>
            <li class="tx2_6_2"><a href="javascript:dev_district('광주광역시','남구');" alt="광주광역시 남구" title="광주광역시 남구">남구</a>
            </li>
            <li class="tx2_6_3"><a href="javascript:dev_district('광주광역시','동구');" alt="광주광역시 동구" title="광주광역시 동구">동구</a>
            </li>
            <li class="tx2_6_4"><a href="javascript:dev_district('광주광역시','북구');" alt="광주광역시 북구" title="광주광역시 북구">북구</a>
            </li>
            <li class="tx2_6_5"><a href="javascript:dev_district('광주광역시','서구');" alt="광주광역시 서구" title="광주광역시 서구">서구</a>
            </li>
        </ul>
    </div>
    <div class="mappedcity" style="display: none;">
        <img src="/map/Jeju.png" alt="제주특별시">
        <ul>
            <li class="tx2_15_1"><a href="javascript:dev_district('제주특별시','서귀포시');" alt="제주특별시 서귀포시"
                                    title="제주특별시 서귀포시">서귀포시</a>
            </li>
            <li class="tx2_15_2"><a href="javascript:dev_district('제주특별시','제주시');" alt="제주특별시 제주특별시시"
                                    title="제주특별시 제주시">제주특별시</a></li>
        </ul>
    </div>
</div>
<script>
    function FindDistrict(selected_city) {
        var i;
        var x = document.getElementsByClassName('mappedcity');
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        document.getElementById(selected_city).style.display = "block";
    }


</script>

