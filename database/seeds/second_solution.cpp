#include <iostream>
using namespace std;

int kth(int *arr1, int *arr2, int *end1, int *end2, int k)
{
    if (arr1 == end1)
        return arr2[k];
    if (arr2 == end2)
        return arr1[k];
    int mid1 = (end1 - arr1) / 2;
    int mid2 = (end2 - arr2) / 2;
    if (mid1 + mid2 < k)
    {
        if (arr1[mid1] > arr2[mid2])
            return kth(arr1, arr2 + mid2 + 1, end1, end2,
                k - mid2 - 1);
        else
            return kth(arr1 + mid1 + 1, arr2, end1, end2,
                k - mid1 - 1);
    }
    else
    {
        if (arr1[mid1] > arr2[mid2])
            return kth(arr1, arr2, arr1 + mid1, end2, k);
        else
            return kth(arr1, arr2, end1, arr2 + mid2, k);
    }
}

int main()
{
    int n,m;
    int arr1[100];
    int arr2[100];
    int k;
    cout<<"Enter size of first array!\n";
    cin>>n;
    cout<<"Enter size of second array!\n";
    cin>>m;
    for(int i=0;i<n;i++)
    {
        cout<<"Enter arr1["<<i<<"] = ";
        cin>>arr1[i];
    }
    cout<<"\n-------------------------\n";
    for(int j=0;j<m;j++)
    {
        cout<<"Enter arr1["<<j<<"] = ";
        cin>>arr2[j];
    }
    cout<<"\n-------------------------\n";
    cout<<"Enter K-th = "<<endl;
    cin>>k;
    cout<<"\n-------------------------\n";
    cout<<"The K-th is =";
    k--;
    cout << kth(arr1, arr2, arr1+n , arr2+m ,  k);
    return 0;
}
