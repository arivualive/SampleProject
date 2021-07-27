
var SlpIndex = new Array(7);

function ProcSlpCount(st1){

	var cnt;
	var i;

	if(SlpIndex[0] == -1 || SlpIndex[1] == -1){
		return;
	}

	if(st1> 0){
		cnt=0;

		for(i=3;i<7;i++){
			if(PRD[i]>0){
				cnt++;
			}
		}
		if(cnt==0){
			PRS[SlpIndex[0]]=0;
			PRS[SlpIndex[1]]=0;
		}else{
			if(cnt==4){
				PRS[SlpIndex[0]]=1;
				PRS[SlpIndex[1]]=1;
			}else{
				PRS[SlpIndex[0]]=1;
				PRS[SlpIndex[1]]=0;
			}
		}
	}
}

function ProcSlpCountMember(st1){

	if(st1==1){

		if(SlpIndex[2] == -1){
			return;
		}

		PRS[SlpIndex[2]]=0;

		if(st1 == 1){
			if(PRD[5] > 0){
				PRS[SlpIndex[2]]=1;
			}
		}
	}

}

function ProcSlpCountSampleSleep(st1){

	var cnt;
	var i;

	if(st1 > 0){
		cnt=0;

		for(i=3;i<7;i++){
			if(PRD[i]>0){
				cnt++;
			}
		}
		
		if(cnt==0){
			PRS[SlpIndex[3]]=0;
			PRS[SlpIndex[4]]=0;
		}else{
			if(cnt==4){
				PRS[SlpIndex[3]]=1;
				PRS[SlpIndex[4]]=1;
			}else{
				PRS[SlpIndex[3]]=0;
				PRS[SlpIndex[4]]=1;
			}
		}
	}
}


function ProcSlpCountChohakujin(st1){

	if(st1 > 0){
		PRS[SlpIndex[5]] = PRD[5];
	}

}

function ProcSlpCountShirohana(st1){


	if(st1==1){

		if(SlpIndex[6] == -1){
			return;
		}

		PRS[SlpIndex[6]]=0;

		if(st1 == 1){
			if(PRD[5] > 0 || PRD[6] > 0){
				PRS[SlpIndex[6]]=1;
			}
		}
	}

}

function ProcSlpCountSleepKaiin(st1){


	if(st1>0){
		PRS[SlpIndex[0]]=0;

		if(PRD[5] > 0){
			PRS[SlpIndex[0]]=1;
		}
	}

}



