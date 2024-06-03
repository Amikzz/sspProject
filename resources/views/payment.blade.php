<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSwap - Payment Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/2.8.2/alpine.js" defer></script>
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

<nav class="bg-gray-800 p-4 shadow-lg">
    <div class="container mx-auto">
        <div class="flex items-center justify-between">
            <div class="text-white text-xl font-bold">SkillSwap</div>
        </div>
    </div>
</nav>

<div class="container mx-auto my-10 p-6 bg-white shadow-lg rounded-lg">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-2xl font-bold">Payment Information</h2>
        <div class="flex items-center space-x-2">
            <div class="w-8 h-8 bg-green-500 rounded-full text-white flex items-center justify-center">1</div>
            <div class="w-8 h-8 bg-green-500 rounded-full text-white flex items-center justify-center">2</div>
            <div class="w-8 h-8 bg-gray-300 rounded-full text-gray-600 flex items-center justify-center">3</div>
        </div>
    </div>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <div class="col-span-1">
            <form>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="card-name">
                        Name on Card
                    </label>
                    <input id="card-name" type="text" placeholder="John Doe" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="card-number">
                        Card Number
                    </label>
                    <input id="card-number" type="text" placeholder="1234 5678 9012 3456" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4 grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="expiry-date">
                            Expiry Date
                        </label>
                        <input id="expiry-date" type="text" placeholder="MM/YY" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div>
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="cvc">
                            CVC
                        </label>
                        <input id="cvc" type="text" placeholder="123" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                        Pay Now
                    </button>
                    <a href="#" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
        <div class="col-span-1 bg-gray-100 p-6 rounded-lg shadow-inner">
            <h3 class="text-xl font-bold mb-4">Order Summary</h3>
            <div class="mb-2">
                <div class="flex justify-between">
                    <div>SkillSwap Premium Subscription</div>
                    <div>Rs. 250.00</div>
                </div>
                <div class="text-gray-500 text-sm">1 Month Access</div>
            </div>
            <div class="mb-2">
                <div class="flex justify-between">
                    <div>Discount</div>
                    <div>-Rs. 10.00</div>
                </div>
                <div class="text-gray-500 text-sm">Promo Code: SKILLS10</div>
            </div>
            <hr class="my-4">
            <div class="flex justify-between font-bold text-xl">
                <div>Total</div>
                <div>Rs. 240.00</div>
            </div>
            <div class="mt-6">
                <h4 class="text-lg font-bold mb-2">Accepted Payment Methods</h4>
                <div class="flex space-x-4">
                    <img src="data:image/png;base64,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" alt="Visa" class="h-8">
                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAP4AAADGCAMAAADFYc2jAAABC1BMVEX////rABv3nhv/XwAjHyAAAADqAAARCgz/XgD3mgDrABr2lgAgHB0UDg/3oRz/WgCSkZGEg4QbFhcLAAOpqKiamZn39/fZ2Ninpqbr6+scGBnrAA7rABS3t7ddW1xPTE0rJyj96dP4lhjo6OjDwsL6ztH6xIb827jxcXj3oyr+9+75um/84+X72Nv7Ugj9cgtDQEF6eHhwbm/3s7fvTljyfoT1nqP84sX+8eP6iRT3QQ/7gBH+8fJpZ2f4qDv70KHtNUL4rEr5s1zsIzLziI75uGr2qK36yZHyLRTvWWLuQk3+bAj2rbE2MjPAv7/vUVr4sFb4wMT7zpvwZGz0lJjsGSvydXv4o0L2MgDD5DSVAAAOVElEQVR4nO1d6VrjOhI1YNk4cboTZ99DZyMQZkhYZ4aw01y4HW5zaXrm/Z9ktHiRHTuLY8n6Pjh/wIukOlWlUkl2LElaGxcHR6cnb39dv29gJN7vjt9OTo+6F+tXTbC307/q7d9eDjYJBpc/93tX/Z29qBoIi+HRyXNVgahWa4nEhsk/Uavik8r17x8H6zVw3u/daMmkBrFJA52Ap296/fNomKyM4fe3GqRYs1jPAqoB3nB8GlIF51cPWtJD2wuoBO32irsKuifv0OTBzCkdQBVUd19XbWCn92URdUoFm70zFiz9cXCCrL4EdVoFb93lG9jpQaMuRd1WQVLb32HH2MHF6Z2iLGP2GQ3U7ofLNLB3NViRu6WBL3+zDoYHu6vZ3aUBRXla6AI7+6G4Wxp4YOkC3ePl+nsgqsrd3ChwdrMGeaKAS1ZRoPusVNfhjlFT7o4CyV8m1+JOwEYBw+PQXj+jAN8ucH4TBXmsgJuou0BhNwLLOwr4ayYI7u1HRR4r4CHSIPhdUSIjj1BV7t0NXK3Z573Qkn9HRn54HWKkWwDlneoB55F0eo8CBhH1gF8RdXo3aspvq4HH6MkjJHsRkL9gYHoCZQNPBvYuo/V7B9pg7cnAa4Qhz4uacipJfTamJ0hercf+hJXpMRLKU4+V6U3+D2uQLzxHG/Bn+f9j69sXpvy1QeghcJhg5/gYte2t7W3G/De1kCNAl0nEp/DHFsLXfzHmn+yHYX/EtNvb7CH//7DmHyIAfufFngf/x1XZnzIOehv/3nLw9Z+s+a+YAXFlz8P+K/H/zpr9H1tbnPmv4P9HvNkLFf+6/KIexV+U8W/Imn3Nhz3kzzr/SS6X/2wwznY2vvrSh/kfW/qb2jL57zHjTHfjH77sIf8txubfHCxmf893yHO5P+vhX9tfxP6Vf9DnGf4WhP8L1mEvMYc9Cn9s6W8m56//PMfV8YXo/sxz3Xmuj83POvvR5mS/zF3ff8Tn6/7Bo3/Mrh+z+8eQ6sfh/kHPf1i7/sb2EvS3vrJlD93fP/mLMeFxuT/z5Md38TummY6P+b+xpe8f/d7ij3um+f9kHf1uZtkfsHb9ZY2Pcl/G9JOz7388iWJ8Hua/FNj4cZhfmJ7Px/ye3n/B2vjzZ3oz5v/GmL4n+Asy5tvm57zwIUbCR5mfLXtP6idEtu+izzXzF2Cq5wbXid9QpFHPNP83xvSp4PdLrMCHzc88+DnLPnfxPNiYz5+192sC+z6PzM/yfs4P85e0Pjfvf2bt+6vGfUyfeez/QtgXxEp4LfB65BHrc6059JlnPuSJ14mIXZ/fmt+1iF0fgXXn3yRdn/V0JyR7Pp2/K2bX5/C4W+uLOuojbHN53LnLerYXmj7zJa+fIkc+9mn/Jo+FnrDsuSz5CLbI6aL/jTX9HXEDP4/QfyZqyovpc0h7mb+8HTbw80h7H0Vc6OJHf1/6Leqwz2PgfxDr4R5v+jfSk7BZD4cFn0vpWFz67Ke8A/Y5b4hFbtv87LNeoemzZg/ps075Baf/sa3PfJFf7L7/wSO/yGkPh3Gf+VqXyFnfT+nkA+f82oO4C718HvKKPN/n8H7TB1/tEeplXg991i94aGcfe6X3XJLW+/zkEghPnzH7zaSor7Yg8Hm9RdC3G3iMe7eQ/g9RQz+f93qFDf2cftMh6jNO9oF/T8jXuQl4vdQt6HMeXr/oEPQZL59Xe4Tt/Jy6vlC/YHTA77eMQo78/H7NI+Ssh+NHXARM+3n+lklA72fv+84H/Jh/sWX12M/1A0bCLfbz/RGzcJkPt5yH4F2wJ33MH25qNHvRVvv5vMxNQazgxy3htSDUD/h5/3w/9g/18Tb+zGf7BFrxjOO7TQKZP5ZvNgrT+/n3fKGCP/ewT8D9u+QB7DlOdlwQ4isG21tsyXsTPgdCPPBg/63ewP3qfscf/di/z3MbxF6SEqzdf+HXi5g/1J73nfLYJ74xf6U/5tyPzzPtOYg1+nOL+n//d2dw3vf5ZGmsHyzlt0HDo9SD8DF/jF8v47g9SU/qnZ37fq47tu7PfneCpXanO2bN33/Zl/mDDW3mA6X+eGe97O0X/rbZr24uuTPfRZVx+E/4ZD/sw97SG3PGEP5F2ZUH44A3/xgnOn7gvC+VMDtSOfy57EQpKHvk/4z510T1fIJhlf0+rHjEYx71wu3FenHHehferzjbYb0T72bYrag55H9f/2TKHeV6ofchZrwHNcT/mG9CunAXsnlguQM53oOc6Q7k6+9BPmQYAJRaV5LOB+w2IQ/f7R2cMBoBE8oTaaDHygHWc3wL3Q0WDlBVjqwGzjZZOICmhRjtfRG9A9SUtwuqAQYOEI3pCQ6uIx0CEsrGq7uBnctoFaANQm47H4CjamQKSCjKr9kG+lp0PUDT1gz4PvilRKKARFX5feHbwGNECtBW3XB8ORTu11cAtPyuP3mIvV5yfQVA8uHTvPm4gB6wThCsKcpJIHmsgHU9gCF5jB93Ssgf/UKv3zgtLGygPwjtAlpyEH2f9+Lgt7K6BiB35el1ceUIO/taCB/QtOR+tNE+EEdPK2kAcX/+PtfrPejfJlfSAOT+s8/U690ovO4qS6kAUVeefqzCnaC/ry2nAkg9+cCTu4mD7081pIOavxISNcRcOf7VDdvAztUtUkGwDuC1pHZ7xcnnfTB8vX96VzCq1WoNAf4lJzaO74+G6zZw3n+8HUD7ahgWacQ7qQ1uH/vrT+nWx7D74/R+9+3p+fr6+vmvt92T0x/dg8VBfnmc7/SvevsPtzc3lzc3tw/7vav+mQjEP/GJT3ziE5/4xCc+8QnhMJVblUzcQsSHVkVXY6BfzrZaqTr/dr1o6XIqDvpA18FHpi/Ln/Rjxyf95egX5hwtOj17oYDov6xXxSqFZy6ZhwvopyE6klQ6BAC0RkV8rpxGR8bEI31xNIWnp5m2JOVhKftqodQwALoyzpXJjfBqJiXLxiSNkberaKeb8Ea1kXNq7aA7JKmOLkxzzn1ZeCxPaP/pjFvonnTZltpsCxZ/cRWnJF1AH2RVkC/LoCLLsp4C6M4SUPGRAaZl58b2IUjp6LQK0pIMS1mVlkDWQBdg8SxoIAW+AFVNoTOGigAOrTpGds1Ov4CtqUCaAEO2e0u5Ae/TzRttSlO7/byEyhCl5sziFae4S9IF9A10uYUKY4CxlAbWgWwAm/8Lls+8KXPoVDoit+vkknqI75VpVJrkznJLtc/ptvZyWVlujbKkYuyxHZCSqRstmraMMki3YEt5u7icIQ0CU1Lqzsx0IX0Z6kqFzpJFFLJjWFUK+TKqxLAM18EN4PMpXMCqFF+ARlKhs6q6DIKtX5ANxAbdidRg0iLyG1gAMCE16lZTsEJdxSqpu9uX3fRTruIBkgbSh0Kli+ViTjewJDIYddrtlyYWkvSwAhJJx+c7GaJds9ImvF+dINLlTtogEhTT+Xwa9f1xHiFdwndOVFR5vYB6NhIRtB35oUGL7WKp4zQ1hk0VS1Ozl7RRgQrIoPZHWD0u+tDKsHiuM1fSQPq6Tny80MIVm5SlCWaA/x3DfysykVcqTw27UhTgjaZdW65t/Vf2Rv4iPFGxnAl1D2PiyA+K9n2oKV23juuk7gZs0bAiURv3VZo+VXyEivtJGkzf4kscR02bR4iaLtv/OXGgYNguhVj6Vj8z7iNawNYOkpJUiOSnaihTjmEDGV9P2SNbGXVTij5VvICL+0kaSF9v2UeqTheeGGY0Qm1kS06hOqCtr8uO8oPpw6pNe1uEyGVUN2W9HLyQzUtu5LPuykpZF/05xetB5jGBIv/IPjqs0MpIqyZ9bDk6rVB1uu/rcIgtddwW89JHvp+lOoM9IGH5nbrHKdoAJpDvZ6ljpHSavqe4v6S+gPRtb8ftVJyeXLKqhlqxu611n1lpEVhDPgANiq6XPhkhshZQWDUaPvIjA0y9Quq6XGnQJ5qVAPozxR1Jw9OHpjJczcOczqo05yQEBjCsKDJDv+7OBXA+cOgjP2rKkcAE8uARfQJ2S3/6U1cXk3CQWZv+1EufrrTYgCMsyftgN7D4+9IneYAFEEC/4kt/TJ9ozKMfKGlY+k1XSJCwj9HRup5pwHRcxfwD6KNOYozSLuR85IexRNe9QkJS7s4HT/jTR5Ia9J3Nyvr0M65BK2C4K5Jk5sWfPjrO5qRZeOTHTXlHEm88bAeGPm/xwuLIv5h+x+N9aEjwqbRDjTozAx802GxMm5W/4yREDlDPoRcsUdbgT39JSW0sRV9CeYZDBkdxq1JK1W2KPh6bnIrNsZvKHaxyHvmllKspqW1V5iRnJI740yeZi7+k4emXAD1JAVQmXQdp2ytxKmcJCTWmp/Cl4otDwcpIYLws+tMnTZkiFScklqRxamsqLw/kYPrBkq5BXzpEo1s2NSqVMjIZwsxKU3BW3ci/FIud/BQ6mm5nJyhl1NVMPjM1Z3xYFtDKv3Re8k1gVKb+9M2m1DFs6hAYps+38HKADtsfGWRyHEA/WNJ16BcMg2Q3WTyFbFmV4om6kTVnpzN+p6dUeL8ZNfHKgI6mpnjRw7TwjPwFPJ/FTVXs6UwbUO3rqTn0CxWXpA79Qj7fkbxYkr5UOAS6la6Ajr3cUU9Riwsw76Fi+8ROdCxfTFNLJhXQLPvLLxWadlNo4k6GkvLUPmmAoh5M3yOps9yReannvdm0hOzmOAdaMXMG2BK6aFddSgE1ZaRgtlKUDKdUDs7J4Xl0ATRceX8GZNH5LCpAUGziU0YKtvLi2whBfUrug1WObYnzWaDiZpptLLXpPD7FaUmRY5KEMV3KFGfMX4Rou46cUF52HaFVyXFjnC56S7Xr6fEEXqh7ddsujSaNUYnWSTuXgbdm6s45byOmIKgovM9FDLefd7fvX9xP0lK9OJq58QOB2P7/D3BPnQ/G/gkAAAAASUVORK5CYII=" alt="MasterCard" class="h-8">
                    <img src="data:image/jpeg;base64,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" alt="PayPal" class="h-8">
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="bg-gray-800 text-white p-4 mt-8">
    <div class="container mx-auto text-center">
        <p>&copy; 2024 SkillSwap. All rights reserved.</p>
    </div>
</footer>

</body>
</html>
