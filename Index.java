public class Index{
    //main
    public static void main(String[] args){
	    int num = computeNum(5,26,17);
	    int ret = num*2;
	    System.out.println(ret);
    }

    //demo 1
    private static int computeNum(int a,int b,int c){
	    int ret = a + b + c;
	    return ret;
    }
}
