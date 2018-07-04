<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<form method="post">
	<!-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"></input> -->
	<button id="btn1" value="val1" name="btn1">K-Means</button>
</form>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn1").click(function(e){
			console.log(clusterc1.length);
			console.log(clusterc2.length);
			console.log(clusterc3.length);
			console.log(clusterc4.length);
			e.preventDefault();
			var request = $.ajax({
				url : '/kmeansbalita-post',
				headers: {
				  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				  },
				type:'POST',
				data:JSON.stringify({
					varc1: clusterc1,
					varc2: clusterc2,
					varc3: clusterc3,
					varc4: clusterc4,
					varn1: totalss(clusterc1),
					varn2: totalss(clusterc2),
					varn3: totalss(clusterc3),
					varn4: totalss(clusterc4)
				
				}),
			contentType:"application/json; charset=utf-8",
			success: function(data){
				console.log("sukses");
			}
			});
		});
	});
</script>
<script type="text/javascript">
	var jmlh = <?php print_r(json_encode($kmzbalita)) ?>;
	var total = <?php print_r(json_encode($kmzzbalita)) ?>;

	// console.log(total);
	var data = [];
	var loop = [];

	for(var i = 0; i<jmlh; i++)
	{
		var array = $.map(total[i], function(value, index){
			return [value];
		});
		data.push(array);
	}
	// console.log(data);
	var hasil1 = [[]];
	var total1 = [[]];

	var hasil2 = [[]];
	var total2 = [[]];

	var hasil3 = [[]];
	var total3 = [[]];

	var hasil4 = [[]];
	var total4 = [[]];

	var c1 = [24, 101];//Gemuk
	var c2 = [18, 105];//Normal
	var c3 = [13, 81];//Kurus
	var c4 = [10, 79];//Sangat Kurus

	var clusterc1 = [];
	var clusterc2 = [];
	var clusterc3 = [];
	var clusterc4 = [];

	var c11 = [];
	var c22 = [];
	var c33 = [];
	var c44 = [];

	function kmeans(c, hasil, total){
		for(var i = 0; i<data.length; i++){//pengulangan buat data diatas
			var x = data[i].map(function(item, index){
				return Math.pow(item - c[index], 2);//math pw buat pangkat yaaaa ,2 pangkat 2
			})
			hasil[i] = x;
		}
		for(var h=0; h<hasil.length; h++){
			//h hitung kbawah
			var nilai = 0;//tampungan total nilai stiap ganti baris jadi 0
			for(var k=0; k<hasil[h].length; k++){
				//k hitung kesamping
				nilai += hasil[h][k];
			}
			total[h] = nilai;

			total[h] = Math.sqrt(nilai);//Math sqrt buat akar
		}
	}
	//buat jumlahin c1 c2 c3 c4 yang udah kecluster
	function hasilakhir(){
		kmeans(c1, hasil1, total1);
		kmeans(c2, hasil2, total2);
		kmeans(c3, hasil3, total3);
		kmeans(c4, hasil4, total4);
//dipindah kesini biar dikosongin setiap fungsi hasilakhir() dijalanin
		clusterc1 = [];
		clusterc2 = [];
		clusterc3 = [];
		clusterc4 = [];
		//karena kita pake fungsi push(), jadi tiap pengulangan harus dikosongin lagi arraynya
	//fungsi push buat nambah array, jadi kalo ga dikosongin lagi, arraynya bakal nambah terus setiap pengulangan
		jarakc1=[];
	    jarakc2=[];
	    jarakc3=[];
	    jarakc4=[];

		for(var a=0; a<data.length; a++){
			if(total1[a]<total2[a] && total1[a]<total3[a] && total1[a]<total4[a]){//membandingkan
				clusterc1.push(data[a]);
				jarakc1.push(total1[a]);
			}
			else if(total2[a]<total3[a] && total2[a]<total4[a]){
				clusterc2.push(data[a]);
				jarakc2.push(total2[a]);
			}
			else if(total3[a]<total4[a]){
				clusterc3.push(data[a]);
				jarakc3.push(total3[a]);
			}
			else{
				clusterc4.push(data[a]);
				jarakc4.push(total4[a]);
			};
		}

		c11 = [];
		c22 = [];
		c33 = [];
		c44 = [];
		//alasan c11 dan c22 dipindah kesini sama seperti alasan clusterc1 dan clusterc2
	//biar tiap pengulangan c11 dan c22 balik jadi 0 lagi, ini alasan kedua kenapa beda tiap diulang

		for(c=0; c<data[0].length; c++){//pengulangan sesuai banyaknya atribut di data
			c11.push(0);//masukin angka 0 ke array c11
			c22.push(0);
			c33.push(0);
			c44.push(0);
			//biar bisa dinamis, c11 sama c22 banyak atributnya nyesuain sama var data (kalo nanti ambil dari db kan banyak atributnya ga pasti)
		}

		for(var y=0; y<clusterc1.length; y++){
			var yy = c11.map(function(item, index){
				return item + clusterc1[y][index];
			})
			c11 = yy;
		}
		for(var y1=0; y1<c11.length; y1++){
			c11[y1] = c11[y1] / clusterc1.length;
		}

		for(var z=0; z<clusterc2.length; z++){
			var zz = c22.map(function(item, index){
				return item + clusterc2[z][index];
			})
			c22 = zz;
		}
		for(var z1=0; z1<c22.length; z1++){
			c22[z1] = c22[z1] / clusterc2.length;
		}

		for(var w=0; w<clusterc3.length; w++){
			var ww = c33.map(function(item, index){
				return item + clusterc3[w][index];
			})
			c33 = ww;
		}
		for(var w1=0; w1<c33.length; w1++){
			c33[w1] = c33[w1] / clusterc3.length;
		}

		for(var s=0; s<clusterc4.length; s++){
			var ss = c44.map(function(item, index){
				return item + clusterc4[s][index];
			})
			c44 = ss;
		}
		for(var s1=0; s1<c44.length; s1++){
			c44[s1] = c44[s1] / clusterc4.length;
		}
	}

	function arraysEqual(a, b){
		if(a === b) return true;
		if(a == null || b == null) return false;
		if(a.length != b.length) return false;

		for(var i = 0; i < a.length; i++){
			if(a[i] !== b[i]) return false;
		}
		return true;
	}

	hasilakhir();
	// var stop = 0;
	while(arraysEqual(c1, c11) == false && arraysEqual(c2, c22) == false && arraysEqual(c3, c33) == false && arraysEqual(c4, c44) == false){
		c1 = c11;
		c2 = c22;
		c3 = c33;
		c4 = c44;
		hasilakhir();
		// if(stop == 4)
		// {
		// 	break;
		// }
		// stop++;
		if(arraysEqual(c1, c11) == true && arraysEqual(c2, c22) == true && arraysEqual(c3, c33) == true && arraysEqual(c4, c44) == true){
			console.log("selesai");
		}
	}
	function totalss(clstr)
	{
	var hasil = 0;
	for(var i=0; i<clstr.length;i++)
	{
		hasil += clstr[i][0];
	}
	return hasil;
	}
	console.log(c11);
	console.log(c22);
	console.log(c33);
	console.log(c44);
	console.log(jarakc1);
	console.log(jarakc2);
	console.log(jarakc3);
	console.log(jarakc4);
	console.log(totalss(clusterc1));
	console.log(clusterc1);
	console.log(totalss(clusterc2));
	console.log(clusterc2);
	console.log(totalss(clusterc3));
	console.log(clusterc3);
	console.log(totalss(clusterc4));
	console.log(clusterc4);
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////


</script>


</body>
</html>