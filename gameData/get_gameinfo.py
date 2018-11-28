# author:群众
# time:2018/11/21
# function:获取steam上一些游戏信息
import os
import re
from lxml import etree
import random
import requests

headers = []


def init():
    h1 = {'User-Agent': 'MMozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Chrome/55.0.2883.87 Safari/537.36'}
    h2 = {'User-Agent': 'MMozilla/5.0 (Windows NT 6.1; WOW64; rv:31.0) Gecko/20100101 Firefox/31.0'}
    h3 = {'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0; DigExt)'}
    headers.append(h1)
    headers.append(h2)
    headers.append(h3)


def gethtml(html):
    max_index = headers.__len__()-1
    index = random.randint(0, max_index)
    browser_header = headers[index]
    req = requests.get(html)
    if req.status_code == 200:
        req.encoding = 'utf-8'
        return req.text
    else:
        print('get request failed')


def parsehtml():
    """""
    games = [['休闲', 37], ['体育', 5], ['冒险', 35],
             ['动作', 38], ['模拟', 20], ['独立', 72],
             ['竞速', 3],  ['策略', 16], ['角色扮演', 16],
             ['大型多人在线', 4]]
    """
    stype = "大型多人在线"
    games = [[stype, 1]]
    list_urls = []
    list_names = []
    list_imgs = []
    list_imgs_content = []
    # 构建url
    print('开始构建url...')
    index = "https://store.steampowered.com/tags/zh-cn/"
    for game_type in games:
        for i in range(game_type[1]):
            url = index + game_type[0] + "/#p=" + str(i) + "&tab=NewReleases"
            list_urls.append(url)
    print('结束构建url。')
    print('开始下载游戏名字,图片...')

    # 获得所有游戏名字
    for url in list_urls:
        print(url)
        text = gethtml(url)
        text = etree.HTML(text)
        game_names = text.xpath('//*[@id="NewReleasesRows"]/a[*]/div[3]/div[1]/text()')
        game_img = text.xpath('//*[@id="NewReleasesRows"]/a[*]/div[1]/img/@src')
        for i in game_names:
            list_names.append(i)
        # 获得对应游戏img
        for i in game_img:
            list_imgs.append(i)
    # 获取图片的内容
    for i in list_imgs:
        req = requests.get(i)
        list_imgs_content.append(req.content)
    print('结束下载游戏名字,图片。')

    # 写入文件re.sub('[\/:*?"<>|]','-',fileName)
    mkpath = 'imgs\\' + stype + '\\'
    if not os.path.exists(mkpath):
        os.makedirs(mkpath)
    for name, img in zip(list_names, list_imgs_content):
        filepath = mkpath + re.sub('[\/:*?"<>|]', '-', name) + '.jpg'
        f = open(filepath, 'wb')
        f.write(img)
        f.close()


if __name__ == '__main__':
    init()
    parsehtml()
