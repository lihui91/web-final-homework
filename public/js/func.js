//记录城市的名字数组
cityareaname = new Array(35);
var u_username="";
var u_email="";
var u_password="";
var u_repassword="";
var u_area="";
var u_sex="";
//保证只有一个被选中
function changeRadio(name) {
	document.getElementById("male").checked = false;
	document.getElementById("female").checked = false;
	document.getElementById(name).checked = true;
}

//new Option("文本","值",true,true)
//后面两个true分别表示默认被选中和有效!
//eval 执行里面的string语句
function firstArea(preP, selectP) {
	var exe;
	a = 0;
	//初始化数组，建立第一个省区选项库
	if (selectP == '01') {
		a = 1;
		tempoption = new Option('web技术', 'web技术', false, true);
	} else {
		tempoption = new Option('web技术', 'web技术');
    }
	exe = executePString(preP, 1);
	eval(exe);
    cityareaname[0] = new Array('Vue大法好', 'PHP真香', 'Uni_App专区', 'Spring_boot');
    

	if (selectP == '02') {
		a = 2;
		tempoption = new Option('军事', '军事', false, true);
	} else {
		tempoption = new Option('军事', '军事');
	}
	exe = executePString(preP, 2);
	eval(exe);
	cityareaname[1] = new Array('神装铁甲', '枪械之美', '军史解密', '冲锋号');

	if (selectP == '03') {
		a = 3;
		tempoption = new Option('TJ新天地', 'TJ新天地', false, true);
	} else {
		tempoption = new Option('TJ新天地', 'TJ新天地');
	}
	exe = executePString(preP, 3);
	eval(exe);
	cityareaname[2] = new Array();
}

//返回要执行的js语句
function executePString(preP, num) {
	return 'document.getElementById("' + preP + '").options[' + num + ']=tempoption;';
}
//根据省份的改变，城市也要跟着改变
function selectcity(PreP, PreC) {
	cityid = eval('document.getElementById("' + PreP + '").selectedIndex;');
	j = eval('document.getElementById("' + PreC + '").length;');
	//把上一次的查询结果清零
	for (i = 1; i < j; i++) {
		eval('document.getElementById("' + PreC + '").options[j-i]=null;')
	}
	if (cityid != "0") //当前有选择的省份的时候
	{
		for (i = 0; i < cityareaname[cityid - 1].length; i++) {
			tempoption = new Option(cityareaname[cityid - 1][i], cityareaname[cityid - 1][i]);
			eval('document.getElementById("' + PreC + '").options[i+1]=tempoption;');
		}
	}

}
