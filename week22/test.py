'''
使用 Python 输出 2000 以内的斐波那契数列，对输出的数列进行翻转再去除首尾两个元素后取出次大数和最大数进行求和。
'''

def Fibonacci(num):
    a,b = 1,1
    x = []
    while a <= num:
        print(a)
        x.append(a)
        a,b = b,a + b
    print(x)
    print(x[::-1])

    y = x[::-1]
    del y[0]
    del y[-1]
    print(y)
    print(y[0] + y[1])


Fibonacci(2000)

