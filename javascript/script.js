var i = 0;
        function addclassmy(){
            i=i+1;
            if(i%2!=0){
            var d = document.getElementById("classadder");
            d.classList.add("show");
            }
            else{
                var g = document.getElementById("classadder");
                g.classList.remove("show"); 
            }
        }
        // const items = document.querySelectorAll(".answer");

        // function adddisplayanswer(e){
        //     // document.getElementById("panel").style.display="block";
        //     let ans= document.querySelectorAll('.uploaded-answer');
        // let ansArr= Array.from(ans);
        // ansArr.forEach(()=>{
        // document.querySelectorAll('uploaded-answer').style.display= "block";
        // }

    // Slider Controller
    function slidercontroller(){
        // document.getElementsByClassName("create-post").style.display = "none";
        document.getElementById("create-post-id").style.display = "none";
    }
    function slidercontrollerfirst(){
        document.getElementById("create-post-id").style.display = "block";
    }
